<?php

namespace App\Services\Scraping;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Illuminate\Support\Facades\Http;

class WooCommerceProductScraper
{
    /**
     * Fetch and parse a single WooCommerce product page.
     *
     * @return array{
     *     name: string,
     *     slug: string,
     *     sku: ?string,
     *     shortDescription: string,
     *     description: string,
     *     priceCents: int,
     *     regularPriceCents: int,
     *     onSale: bool,
     *     imageUrls: list<string>,
     * }|null
     */
    public function scrape(string $productUrl): ?array
    {
        try {
            $response = Http::timeout(30)->retry(2, 500)->get($productUrl);
        } catch (\Throwable) {
            return null;
        }

        if ($response->failed()) {
            return null;
        }

        return $this->parse($response->body(), $productUrl);
    }

    /**
     * Parse an already-fetched product page. Split out from scrape() so the
     * extraction logic can be unit-tested against saved HTML fixtures
     * without hitting the network.
     *
     * @return array{
     *     name: string,
     *     slug: string,
     *     sku: ?string,
     *     shortDescription: string,
     *     description: string,
     *     priceCents: int,
     *     regularPriceCents: int,
     *     onSale: bool,
     *     imageUrls: list<string>,
     * }|null
     */
    public function parse(string $html, string $productUrl): ?array
    {
        $xpath = $this->xpathFor($html);
        $ldProduct = $this->extractLdJsonProduct($html);

        $name = $this->extractName($xpath) ?? $ldProduct['name'] ?? null;

        if ($name === null) {
            return null;
        }

        ['regular' => $regularCents, 'sale' => $saleCents, 'onSale' => $onSale] = $this->extractPrices($xpath, $ldProduct);

        return [
            'name' => $name,
            'slug' => $this->slugFromUrl($productUrl),
            'sku' => $this->extractSku($xpath, $html),
            'shortDescription' => $this->extractInnerHtml($xpath, '//*[contains(@class, "woocommerce-product-details__short-description")]') ?? '',
            'description' => $this->extractDescription($xpath),
            'priceCents' => $saleCents,
            'regularPriceCents' => $regularCents,
            'onSale' => $onSale,
            'imageUrls' => $this->extractImageUrls($xpath),
        ];
    }

    private function xpathFor(string $html): DOMXPath
    {
        $dom = new DOMDocument;

        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        return new DOMXPath($dom);
    }

    private function extractName(DOMXPath $xpath): ?string
    {
        $nodes = $xpath->query('//h1[contains(@class, "product_title")]');

        if ($nodes !== false && $nodes->length > 0) {
            return trim($nodes->item(0)->textContent);
        }

        return null;
    }

    private function extractSku(DOMXPath $xpath, string $html): ?string
    {
        $nodes = $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " sku ")]');

        if ($nodes !== false && $nodes->length > 0) {
            $sku = trim($nodes->item(0)->textContent);

            if ($sku !== '') {
                return $sku;
            }
        }

        if (preg_match('/"sku"\s*:\s*"([^"]+)"/', $html, $matches) === 1) {
            return $matches[1];
        }

        return null;
    }

    /**
     * @param  array{price?: string}|null  $ldProduct
     * @return array{regular: int, sale: int, onSale: bool}
     */
    private function extractPrices(DOMXPath $xpath, ?array $ldProduct): array
    {
        $regularNodes = $xpath->query('//p[contains(@class, "price")]//del//bdi | //p[contains(@class, "price")]//del//*[contains(@class,"amount")]');
        $saleNodes = $xpath->query('//p[contains(@class, "price")]//ins//bdi | //p[contains(@class, "price")]//ins//*[contains(@class,"amount")]');

        if ($regularNodes !== false && $regularNodes->length > 0 && $saleNodes !== false && $saleNodes->length > 0) {
            $regular = $this->parseMoneyToCents($regularNodes->item(0)->textContent);
            $sale = $this->parseMoneyToCents($saleNodes->item(0)->textContent);

            return ['regular' => $regular, 'sale' => $sale, 'onSale' => true];
        }

        $priceNodes = $xpath->query('//p[contains(@class, "price")]//bdi | //p[contains(@class, "price")]//*[contains(@class,"amount")]');

        if ($priceNodes !== false && $priceNodes->length > 0) {
            $price = $this->parseMoneyToCents($priceNodes->item(0)->textContent);

            return ['regular' => $price, 'sale' => $price, 'onSale' => false];
        }

        if (isset($ldProduct['price'])) {
            $price = (int) round(((float) $ldProduct['price']) * 100);

            return ['regular' => $price, 'sale' => $price, 'onSale' => false];
        }

        return ['regular' => 0, 'sale' => 0, 'onSale' => false];
    }

    /**
     * Parse a formatted money string into integer cents, without assuming
     * which separator is decimal vs thousands — the two source sites use
     * opposite conventions ("112,45" vs "2,535.35").
     */
    private function parseMoneyToCents(string $raw): int
    {
        $raw = trim(preg_replace('/[^\d.,]/', '', $raw) ?? '');

        if ($raw === '') {
            return 0;
        }

        $lastComma = strrpos($raw, ',');
        $lastDot = strrpos($raw, '.');

        if ($lastComma !== false && $lastDot !== false) {
            $decimalSeparator = $lastComma > $lastDot ? ',' : '.';
        } elseif ($lastComma !== false) {
            $decimalSeparator = ',';
        } else {
            $decimalSeparator = '.';
        }

        $thousandsSeparator = $decimalSeparator === ',' ? '.' : ',';

        $normalized = str_replace($thousandsSeparator, '', $raw);
        $normalized = str_replace($decimalSeparator, '.', $normalized);

        return (int) round(((float) $normalized) * 100);
    }

    /**
     * @return array{name?: string, price?: string}|null
     */
    private function extractLdJsonProduct(string $html): ?array
    {
        if (preg_match_all('/<script type="application\/ld\+json"[^>]*>(.*?)<\/script>/s', $html, $matches) === false) {
            return null;
        }

        foreach ($matches[1] as $block) {
            $data = json_decode($block, true);

            if (! is_array($data)) {
                continue;
            }

            $candidates = $data['@graph'] ?? [$data];

            foreach ($candidates as $candidate) {
                if (is_array($candidate) && ($candidate['@type'] ?? null) === 'Product') {
                    $price = $candidate['offers'][0]['price'] ?? $candidate['offers']['price'] ?? null;

                    return [
                        'name' => $candidate['name'] ?? null,
                        'price' => $price,
                    ];
                }
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function extractImageUrls(DOMXPath $xpath): array
    {
        $nodes = $xpath->query('//*[@data-large_image]');

        if ($nodes === false) {
            return [];
        }

        $urls = [];

        foreach ($nodes as $node) {
            $urls[] = $node->getAttribute('data-large_image');
        }

        return array_values(array_unique($urls));
    }

    /**
     * The two source themes render the description tab under different
     * markup (Elementor's #tab-description vs Woodmart's
     * .o-product-detail-informations__description); try both. When a
     * separate specifications table is present alongside it, append it too.
     */
    private function extractDescription(DOMXPath $xpath): string
    {
        $body = $this->extractInnerHtml($xpath, '//*[@id="tab-description"]')
            ?? $this->extractOuterHtml($xpath, '//*[contains(@class, "o-product-detail-informations__description")]')
            ?? '';

        $attributesTable = $this->extractOuterHtml($xpath, '//table[contains(@class, "o-product-features") or contains(@class, "woocommerce-product-attributes")]');

        return $attributesTable !== null ? trim($body."\n".$attributesTable) : $body;
    }

    private function extractInnerHtml(DOMXPath $xpath, string $query): ?string
    {
        $nodes = $xpath->query($query);

        if ($nodes === false || $nodes->length === 0) {
            return null;
        }

        return $this->innerHtml($nodes->item(0));
    }

    private function extractOuterHtml(DOMXPath $xpath, string $query): ?string
    {
        $nodes = $xpath->query($query);

        if ($nodes === false || $nodes->length === 0) {
            return null;
        }

        $node = $nodes->item(0);
        $document = $node->ownerDocument;

        return $document === null ? null : trim($document->saveHTML($node));
    }

    private function innerHtml(DOMNode $node): string
    {
        $html = '';
        $document = $node->ownerDocument;

        if ($document === null) {
            return '';
        }

        foreach ($node->childNodes as $child) {
            if ($child instanceof DOMElement && in_array($child->tagName, ['script', 'style', 'link'], true)) {
                continue;
            }

            $html .= $document->saveHTML($child);
        }

        return trim($html);
    }

    private function slugFromUrl(string $url): string
    {
        $path = (string) parse_url($url, PHP_URL_PATH);

        return trim(basename($path));
    }
}
