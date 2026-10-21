<?php

namespace App\Services\Scraping;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Facades\Http;

class WooCommerceCategoryScraper
{
    /**
     * Candidate XPath queries for the category archive's own title, tried in
     * order — the two source themes render it with different tags/classes.
     *
     * @var list<string>
     */
    private const TITLE_QUERIES = [
        '//h1[@class="title"]',
        '//h2[contains(@class, "entry-title")]',
        '//h1[contains(@class, "page-title")]',
        '//h1',
    ];

    /**
     * Fetch every product URL listed under a WooCommerce category archive,
     * following WordPress-style pagination (`/page/{n}/`) until a page
     * yields no more products.
     *
     * @return array{name: string, productUrls: list<string>}
     */
    public function scrape(string $categoryUrl, int $maxPages = 50): array
    {
        $productUrls = [];
        $categoryName = null;

        for ($page = 1; $page <= $maxPages; $page++) {
            $url = $page === 1 ? $categoryUrl : $this->pageUrl($categoryUrl, $page);

            try {
                $response = Http::timeout(30)->retry(2, 500)->get($url);
            } catch (\Throwable) {
                break;
            }

            if ($response->failed()) {
                break;
            }

            $parsed = $this->parsePage($response->body());

            $categoryName ??= $parsed['name'];
            $urls = $parsed['productUrls'];

            if ($urls === []) {
                break;
            }

            $productUrls = [...$productUrls, ...$urls];

            if ($page < $maxPages) {
                usleep(300_000);
            }
        }

        return [
            'name' => $categoryName ?? '',
            'productUrls' => array_values(array_unique($productUrls)),
        ];
    }

    private function pageUrl(string $categoryUrl, int $page): string
    {
        return rtrim($categoryUrl, '/').'/page/'.$page.'/';
    }

    /**
     * Parse a single already-fetched archive page. Split out from scrape()
     * so the extraction logic can be unit-tested against saved HTML
     * fixtures without hitting the network.
     *
     * @return array{name: ?string, productUrls: list<string>}
     */
    public function parsePage(string $html): array
    {
        $xpath = $this->xpathFor($html);

        return [
            'name' => $this->extractCategoryName($xpath),
            'productUrls' => $this->extractProductUrls($xpath),
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

    private function extractCategoryName(DOMXPath $xpath): ?string
    {
        foreach (self::TITLE_QUERIES as $query) {
            $nodes = $xpath->query($query);

            if ($nodes !== false && $nodes->length > 0) {
                return trim($nodes->item(0)->textContent);
            }
        }

        return null;
    }

    /**
     * @return list<string>
     */
    private function extractProductUrls(DOMXPath $xpath): array
    {
        $nodes = $xpath->query('//a[contains(@href, "/producto/")]');

        if ($nodes === false) {
            return [];
        }

        $urls = [];

        foreach ($nodes as $node) {
            $href = $node->getAttribute('href');

            if (str_contains($href, '/producto/') && ! str_contains($href, '?')) {
                $urls[] = $href;
            }
        }

        return array_values(array_unique($urls));
    }
}
