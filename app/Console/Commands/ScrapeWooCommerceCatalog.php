<?php

namespace App\Console\Commands;

use App\Services\Scraping\WooCommerceCategoryScraper;
use App\Services\Scraping\WooCommerceProductScraper;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

#[Signature('catalog:scrape')]
#[Description('Scrape product categories from the source WooCommerce sites into database/category.json and database/products.json')]
class ScrapeWooCommerceCatalog extends Command
{
    /**
     * The 4 category archives to import, with whether the resulting
     * category should be visible on the public site.
     *
     * @var list<array{url: string, visible: bool}>
     */
    private const TARGETS = [
        ['url' => 'https://contenedores-modulares.es/categor%C3%ADa-de-producto/contenedore-modificado/', 'visible' => true],
        ['url' => 'https://contenedores-modulares.es/categor%C3%ADa-de-producto/contenedore-sanitario/', 'visible' => true],
        ['url' => 'https://box-modulares.es/categoria-producto/piscinas-desmontables/', 'visible' => true],
        ['url' => 'https://box-modulares.es/categoria-producto/generadores-y-energia/', 'visible' => false],
    ];

    /**
     * Locales populated for new entries. Only "es" is filled by the
     * scraper itself; the others are left as empty placeholders for the
     * translation pass that follows scraping. Categories carry 2 extra
     * (dormant, UI-unused) locales to match the existing category.json
     * shape; products only ever use the 4 live-wired locales.
     *
     * @var list<string>
     */
    private const CATEGORY_LOCALES = ['fr', 'it', 'es', 'de', 'pt', 'en'];

    /**
     * @var list<string>
     */
    private const PRODUCT_LOCALES = ['it', 'es', 'de', 'pt'];

    /**
     * @var list<array{url: string, destination: string}>
     */
    private array $imageQueue = [];

    public function handle(
        WooCommerceCategoryScraper $categoryScraper,
        WooCommerceProductScraper $productScraper,
    ): int {
        $categoriesPath = database_path('category.json');
        $productsPath = database_path('products.json');

        $categories = $this->readJsonArray($categoriesPath);
        $productsData = $this->readJsonArray($productsPath);
        $products = $productsData['products'] ?? [];

        $this->imageQueue = $this->readImageQueue();

        $failedProducts = [];

        foreach (self::TARGETS as $target) {
            $this->info("Scraping category: {$target['url']}");

            try {
                $categoryResult = $categoryScraper->scrape($target['url']);
            } catch (\Throwable $e) {
                $this->error("  Failed to load the category page, skipping this target: {$e->getMessage()}");

                continue;
            }

            $categoryName = $this->normalizeTitle($categoryResult['name']);

            if ($categoryName === '') {
                $this->error("Could not determine the category name for {$target['url']}, skipping.");

                continue;
            }

            $slug = Str::slug($categoryName);
            $categories = $this->upsertCategory($categories, $categoryName, $slug, $target['visible']);

            $productUrls = $categoryResult['productUrls'];
            $this->info("  Found {$categoryName} ({$slug}): ".count($productUrls).' product(s)');

            $bar = $this->output->createProgressBar(count($productUrls));
            $bar->start();

            foreach ($productUrls as $index => $productUrl) {
                try {
                    $scraped = $productScraper->scrape($productUrl);
                } catch (\Throwable) {
                    $scraped = null;
                }

                if ($scraped !== null) {
                    $products = $this->upsertProduct($products, $categoryName, $slug, $scraped);
                } else {
                    $failedProducts[] = $productUrl;
                }

                $bar->advance();

                if ($index < count($productUrls) - 1) {
                    usleep(300_000);
                }
            }

            $bar->finish();
            $this->newLine(2);

            // Persist after every category so a crash (or Ctrl-C) later in
            // the run never loses what's already been scraped.
            $this->writeJson($categoriesPath, $categories);
            $this->writeJson($productsPath, ['products' => $products]);
            $this->writeImageQueue();
        }

        $this->info('Done. '.count($this->imageQueue).' image(s) queued for download.');

        if ($failedProducts !== []) {
            $this->warn(count($failedProducts).' product page(s) failed to load and were skipped:');

            foreach ($failedProducts as $url) {
                $this->warn("  {$url}");
            }

            $this->line('Re-run `php artisan catalog:scrape` to retry them — already-scraped products are upserted, not duplicated.');
        }

        $this->line('Next: `php artisan catalog:download-images`, then `php artisan db:seed --class=CatalogSeeder`.');

        return self::SUCCESS;
    }

    /**
     * @param  list<array<string, mixed>>  $categories
     * @return list<array<string, mixed>>
     */
    private function upsertCategory(array $categories, string $name, string $slug, bool $visible): array
    {
        foreach ($categories as $index => $category) {
            if (($category['slug']['es'] ?? null) === $slug) {
                $categories[$index]['name']['es'] = $name;
                $categories[$index]['visible'] = $visible;

                return $categories;
            }
        }

        $categories[] = [
            'name' => $this->esOnly($name, self::CATEGORY_LOCALES),
            'slug' => $this->sameAcrossLocales($slug, self::CATEGORY_LOCALES),
            'visible' => $visible,
        ];

        return $categories;
    }

    /**
     * @param  list<array<string, mixed>>  $products
     * @param  array{name: string, slug: string, sku: ?string, shortDescription: string, description: string, priceCents: int, regularPriceCents: int, onSale: bool, imageUrls: list<string>}  $scraped
     * @return list<array<string, mixed>>
     */
    private function upsertProduct(array $products, string $categoryName, string $categorySlug, array $scraped): array
    {
        $productSlug = Str::slug($scraped['slug']);
        $images = $this->queueImages($categorySlug, $productSlug, $scraped['imageUrls']);

        $entry = [
            'name' => $this->esOnly($scraped['name'], self::PRODUCT_LOCALES),
            'slug' => $this->sameAcrossLocales($productSlug, self::PRODUCT_LOCALES),
            'category' => $categoryName,
            'short_description' => $this->esOnly($scraped['shortDescription'], self::PRODUCT_LOCALES),
            'description' => $this->esOnly($scraped['description'], self::PRODUCT_LOCALES),
            'sku' => $scraped['sku'],
            'on_sale' => $scraped['onSale'],
            'prices' => [
                'price' => (string) $scraped['priceCents'],
                'regular_price' => (string) $scraped['regularPriceCents'],
                'sale_price' => (string) $scraped['priceCents'],
                'price_range' => null,
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'currency_minor_unit' => 2,
                'currency_decimal_separator' => ',',
                'currency_thousand_separator' => '.',
                'currency_prefix' => '€',
                'currency_suffix' => '',
            ],
            'images' => $images,
        ];

        foreach ($products as $index => $product) {
            $sameCategory = ($product['category'] ?? null) === $categoryName;
            $sameSku = $scraped['sku'] !== null && ($product['sku'] ?? null) === $scraped['sku'];
            $sameSlug = ($product['slug']['es'] ?? null) === $productSlug;

            if ($sameCategory && ($sameSku || $sameSlug)) {
                foreach (['it', 'de', 'pt'] as $locale) {
                    $entry['name'][$locale] = $product['name'][$locale] ?? '';
                    $entry['short_description'][$locale] = $product['short_description'][$locale] ?? '';
                    $entry['description'][$locale] = $product['description'][$locale] ?? '';
                }
                $products[$index] = $entry;

                return $products;
            }
        }

        $products[] = $entry;

        return $products;
    }

    /**
     * Compute the deterministic local destination for each image URL
     * (matching the existing /assets/images/products/... convention) and
     * queue it for the download-images command.
     *
     * @param  list<string>  $imageUrls
     * @return list<array{path: string}>
     */
    private function queueImages(string $categorySlug, string $productSlug, array $imageUrls): array
    {
        $images = [];

        foreach (array_values($imageUrls) as $position => $url) {
            $extension = strtolower(pathinfo((string) parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION)) ?: 'jpg';
            $relativePath = "/assets/images/products/{$categorySlug}/{$productSlug}/".($position + 1).'.'.$extension;
            $destination = public_path(ltrim($relativePath, '/'));

            $this->imageQueue[$destination] = ['url' => $url, 'destination' => $destination];
            $images[] = ['path' => $relativePath];
        }

        return $images;
    }

    /**
     * @return array<string, array{url: string, destination: string}>
     */
    private function readImageQueue(): array
    {
        $path = storage_path('app/catalog/image-queue.json');

        if (! is_file($path)) {
            return [];
        }

        $entries = json_decode((string) file_get_contents($path), true) ?: [];
        $keyed = [];

        foreach ($entries as $entry) {
            $keyed[$entry['destination']] = $entry;
        }

        return $keyed;
    }

    private function writeImageQueue(): void
    {
        $path = storage_path('app/catalog/image-queue.json');

        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        file_put_contents($path, json_encode(array_values($this->imageQueue), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * @param  list<string>  $locales
     * @return array<string, string>
     */
    private function esOnly(string $value, array $locales): array
    {
        return collect($locales)->mapWithKeys(fn (string $locale) => [$locale => $locale === 'es' ? $value : ''])->all();
    }

    /**
     * Slugs are never translated: every locale shares the exact same slug
     * string. Route generation (`route('category', $category->translatedValue('slug'))`)
     * uses whichever locale is active, while lookups always match against
     * `slug->es` (see ShopController::category()) — if the values ever
     * diverged, a non-Spanish nav link would 404.
     *
     * @param  list<string>  $locales
     * @return array<string, string>
     */
    private function sameAcrossLocales(string $value, array $locales): array
    {
        return array_fill_keys($locales, $value);
    }

    /**
     * The Elementor-based theme renders category titles in ALL CAPS
     * ("CONTENEDORE MODIFICADO"); normalize those to sentence case to match
     * the existing catalog's style. Titles that aren't fully uppercase
     * (e.g. "Piscinas desmontables") are left untouched.
     */
    private function normalizeTitle(string $title): string
    {
        $title = trim($title);

        if ($title !== '' && $title === mb_strtoupper($title, 'UTF-8')) {
            $lower = mb_strtolower($title, 'UTF-8');

            return mb_strtoupper(mb_substr($lower, 0, 1, 'UTF-8'), 'UTF-8').mb_substr($lower, 1, null, 'UTF-8');
        }

        return $title;
    }

    /**
     * @return array<string, mixed>
     */
    private function readJsonArray(string $path): array
    {
        if (! is_file($path)) {
            return [];
        }

        $contents = file_get_contents($path);

        return $contents === false ? [] : (json_decode($contents, true) ?? []);
    }

    private function writeJson(string $path, mixed $data): void
    {
        file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)."\n");
    }
}
