<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use UnexpectedValueException;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        $categories = $this->readJson(database_path('category.json'));
        $productsData = $this->readJson(database_path('products.json'));
        $products = $productsData['products'] ?? null;

        if (! is_array($categories) || ! is_array($products)) {
            throw new UnexpectedValueException('Les fichiers du catalogue ont une structure invalide.');
        }

        DB::transaction(function () use ($categories, $products): void {
            $categoriesBySpanishName = [];
            $categoriesBySpanishSlug = [];

            foreach (Category::query()->get() as $category) {
                $translations = $category->getTranslations('slug');

                if (isset($translations['es'])) {
                    $categoriesBySpanishSlug[$translations['es']] = $category;
                }
            }

            foreach ($categories as $categoryData) {
                $spanishName = $categoryData['name']['es'] ?? null;
                $spanishSlug = $categoryData['slug']['es'] ?? null;

                if (! is_string($spanishName) || ! is_string($spanishSlug)) {
                    throw new UnexpectedValueException('Une catégorie ne contient pas de nom et de slug espagnols.');
                }

                $category = $categoriesBySpanishSlug[$spanishSlug] ?? new Category;
                $category->name = $categoryData['name'];
                $category->slug = $categoryData['slug'];
                $category->is_visible = $categoryData['visible'] ?? true;
                $category->save();

                $categoriesBySpanishName[$spanishName] = $category;
                $categoriesBySpanishSlug[$spanishSlug] = $category;
            }

            // ---------------------------------------------------------------
            // AJOUT : détection de TOUTES les catégories manquantes d'un coup
            // Placé AVANT la boucle produits pour lister tous les problèmes.
            // ---------------------------------------------------------------
            $productCategories = collect($products)
                ->pluck('category')
                ->filter()
                ->unique()
                ->values();

            $knownCategories = collect(array_keys($categoriesBySpanishName));

            $missing = $productCategories->diff($knownCategories);

            if ($missing->isNotEmpty()) {
                throw new UnexpectedValueException(
                    "Catégories produits introuvables ("
                    . $missing->count()
                    . ") :\n - "
                    . $missing->implode("\n - ")
                );
            }
            // ---------------------------------------------------------------

            $existingProductsByIdentity = [];

            foreach (Product::query()->get() as $product) {
                $nameTranslations = $product->getTranslations('name');
                $slugTranslations = $product->getTranslations('slug');
                $identity = $this->productIdentity(
                    $product->category_id,
                    $product->sku,
                    $nameTranslations['es'] ?? null,
                    $slugTranslations['es'] ?? null,
                );

                $existingProductsByIdentity[$identity][] = $product;
            }

            foreach ($products as $productData) {
                $spanishCategoryName = $productData['category'] ?? null;
                $category = $categoriesBySpanishName[$spanishCategoryName] ?? null;

                if (! $category instanceof Category) {
                    throw new UnexpectedValueException("Catégorie introuvable pour le produit: {$spanishCategoryName}");
                }

                $name = $productData['name'] ?? null;
                $slug = $productData['slug'] ?? null;

                if (! is_array($name) || ! is_array($slug)) {
                    throw new UnexpectedValueException('Un produit ne contient pas ses traductions de nom ou de slug.');
                }

                $identity = $this->productIdentity(
                    $category->id,
                    $productData['sku'] ?? null,
                    $name['es'] ?? null,
                    $slug['es'] ?? null,
                );
                $product = ! empty($existingProductsByIdentity[$identity])
                    ? array_shift($existingProductsByIdentity[$identity])
                    : new Product;

                $product->fill([
                    'category_id' => $category->id,
                    'name' => $name,
                    'slug' => $slug,
                    'short_description' => $productData['short_description'] ?? [],
                    'description' => $productData['description'] ?? [],
                    'sku' => $productData['sku'] ?? null,
                    'on_sale' => $productData['on_sale'] ?? false,
                    'prices' => $productData['prices'] ?? [],
                    'images' => $productData['images'] ?? [],
                    'attributes' => $productData['attributes'] ?? null,
                ])->save();
            }
        });
    }

    private function readJson(string $path): array
    {
        if (! is_file($path)) {
            throw new RuntimeException("Fichier introuvable: {$path}");
        }

        $contents = file_get_contents($path);

        if ($contents === false) {
            throw new RuntimeException("Impossible de lire le fichier: {$path}");
        }

        $data = json_decode($contents, true, 512, JSON_THROW_ON_ERROR);

        if (! is_array($data)) {
            throw new UnexpectedValueException("Le fichier ne contient pas une structure JSON valide: {$path}");
        }

        return $data;
    }

    private function productIdentity(
        int $categoryId,
        ?string $sku,
        ?string $spanishName,
        ?string $spanishSlug,
    ): string {
        return hash('sha256', json_encode([
            $categoryId,
            $sku,
            $spanishName,
            $spanishSlug,
        ], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR));
    }
}