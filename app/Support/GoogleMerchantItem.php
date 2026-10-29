<?php

namespace App\Support;

use App\Models\Product;

/**
 * One product row of the Google Merchant RSS feed.
 *
 * Category ids are leaves of the official Google product taxonomy.
 * Houses and site cabins have no matching leaf, so the category is omitted.
 */
final class GoogleMerchantItem
{
    /**
     * @param  list<string>  $additionalImagePaths
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public string $slug,
        public string $imagePath,
        public array $additionalImagePaths,
        public string $availability,
        public string $price,
        public ?string $salePrice,
        public string $brand,
        public ?string $mpn,
        public bool $identifierExistsNo,
        public string $condition,
        public ?int $googleProductCategory,
        public string $productType,
        public ?string $color,
        public string $customLabel0,
        public string $customLabel1,
    ) {}

    public static function fromProduct(Product $product, string $locale): ?self
    {
        $title = $product->getTranslation('name', $locale, false);
        if (! is_string($title) || trim($title) === '') {
            return null;
        }

        $slug = $product->getTranslation('slug', $locale, false) ?: $product->getTranslation('slug', 'es', false);
        if (! is_string($slug) || trim($slug) === '') {
            return null;
        }

        $imagePath = $product->cover_image;
        if (! is_string($imagePath) || $imagePath === '') {
            return null;
        }

        $names = $product->getTranslations('name');
        $condition = self::detectCondition(
            is_array($names) ? $names : [],
            (string) ($product->condition ?? 'new'),
            self::supportingTexts($product),
        );
        $title = self::normalizeTitle($title, $locale);
        $description = self::description($product, $locale, $title);

        [$amount, $saleAmount] = self::amounts(
            (bool) $product->on_sale,
            (float) $product->price,
            (float) $product->regular_price,
        );

        if ($amount <= 0) {
            return null;
        }

        $sku = trim((string) ($product->sku ?: 'GSC-'.$product->id));
        $identity = self::identity($title, $sku, (string) config('company.brand', 'GSC'));

        $category = $product->category;
        $categorySlug = $category?->getTranslation('slug', 'es', false);
        $productType = $category?->getTranslation('name', $locale, false)
            ?: $category?->getTranslation('name', 'es', false)
            ?: '';

        $additional = $product->gallery
            ->skip(1)
            ->take(10)
            ->map(fn ($image) => (string) $image->path)
            ->filter()
            ->values()
            ->all();

        return new self(
            id: $sku,
            title: $title,
            description: $description,
            slug: $slug,
            imagePath: $imagePath,
            additionalImagePaths: $additional,
            availability: 'in_stock',
            price: self::money($amount),
            salePrice: $saleAmount !== null ? self::money($saleAmount) : null,
            brand: $identity['brand'],
            mpn: $identity['mpn'],
            identifierExistsNo: $identity['identifierExistsNo'],
            condition: $condition,
            googleProductCategory: self::googleProductCategory(
                is_string($categorySlug) ? $categorySlug : null,
                (string) ($product->getTranslation('name', 'es', false) ?: $title),
            ),
            productType: is_string($productType) ? $productType : '',
            color: self::color($title, $locale),
            customLabel0: is_string($categorySlug) ? $categorySlug : '',
            customLabel1: $condition,
        );
    }

    public static function normalizeTitle(string $title, string $locale): string
    {
        $title = trim(preg_replace('/\s+/u', ' ', $title) ?? $title);
        $title = preg_replace('/(?<=\p{Ll})(?=JLG\b)/u', ' ', $title) ?? $title;

        if (self::isExcessiveCaps($title)) {
            $title = self::toTitleCase(mb_strtolower($title), $locale);
            $title = self::restoreAcronyms($title);
        }

        if ($locale === 'fr') {
            $title = preg_replace('/\b[Pp]ies\b/u', 'pieds', $title) ?? $title;
        }

        if ($locale === 'it') {
            $title = preg_replace('/\bcontenedores\b/iu', 'container', $title) ?? $title;
            $title = preg_replace('/\bcontenedor\b/iu', 'container', $title) ?? $title;
        }

        return trim(preg_replace('/\s+/u', ' ', $title) ?? $title);
    }

    /**
     * @param  array<string, mixed>  $namesByLocale
     * @param  list<string>  $extraTexts
     */
    public static function detectCondition(array $namesByLocale, string $stored, array $extraTexts = []): string
    {
        if ($stored === 'refurbished') {
            return 'refurbished';
        }

        $blob = mb_strtolower(implode("\n", array_map(
            fn ($name) => is_string($name) ? $name : '',
            $namesByLocale,
        )));
        $extra = mb_strtolower(implode("\n", $extraTexts));

        if (self::textMarksUsed($blob) || self::hasOperatingHistory($extra)) {
            return 'used';
        }

        return $stored === 'used' ? 'used' : 'new';
    }

    public static function modelsConflict(string $title, string $description): bool
    {
        if (preg_match('/\b(optimum|star)\s*(\d+)/iu', $title, $titleHaulotte)
            && preg_match('/\b(optimum|star)\s*(\d+)/iu', $description, $descriptionHaulotte)
            && mb_strtolower($titleHaulotte[1].$titleHaulotte[2]) !== mb_strtolower($descriptionHaulotte[1].$descriptionHaulotte[2])) {
            return true;
        }

        foreach (self::modelTokens($description) as $descriptionToken) {
            $family = preg_replace('/\d+/', '', $descriptionToken) ?? '';
            foreach (self::modelTokens($title) as $titleToken) {
                $titleFamily = preg_replace('/\d+/', '', $titleToken) ?? '';
                if ($family === $titleFamily && $titleToken !== $descriptionToken) {
                    return true;
                }
            }
        }

        return false;
    }

    public static function stripConditionClaims(string $text): string
    {
        $text = preg_replace([
            '/\s*[—–-]\s*en estado pr[aá]cticamente nuev[oa]s?/iu',
            '/\s*[—–-]\s*pr[aá]cticamente nuev[oa]s?/iu',
            '/\bpr[aá]cticamente nuev[oa]s?\b/iu',
            '/\bpratiquement neu(?:f|ve|fs|ves)\b/iu',
            '/\bpraticamente nuov[oaie]\b/iu',
            '/\bpraktisch neu(?:e|er|es)?\b/iu',
            '/\bpractically new\b/iu',
        ], '', $text) ?? $text;
        $text = preg_replace('/\s{2,}/u', ' ', $text) ?? $text;
        $text = preg_replace('/\s+([.,;])/u', '$1', $text) ?? $text;

        return trim($text);
    }

    public static function googleProductCategory(?string $categorySlug, string $title): ?int
    {
        $haystack = mb_strtolower($title);

        return match ($categorySlug) {
            'contenedores-maritimos',
            'contenedores-de-envio',
            'contenedores-maritimos-de-20-pies',
            'contenedores-maritimos-de-40-pies',
            'bar-contenedor' => 5831,
            'piscina-contenedor' => 2810,
            'plataformas-elevadoras' => self::handlingCategory($haystack),
            default => null,
        };
    }

    /**
     * @return array{brand: string, mpn: ?string, identifierExistsNo: bool}
     */
    public static function identity(string $title, string $sku, string $fallbackBrand): array
    {
        foreach (self::manufacturers() as $needle => $brand) {
            if (! preg_match('/\b'.preg_quote($needle, '/').'\b/iu', $title)) {
                continue;
            }

            $mpn = self::extractMpn($brand, $title);

            return [
                'brand' => $brand,
                'mpn' => $mpn,
                'identifierExistsNo' => $mpn === null,
            ];
        }

        return [
            'brand' => $fallbackBrand !== '' ? $fallbackBrand : 'GSC',
            'mpn' => $sku !== '' ? $sku : null,
            'identifierExistsNo' => $sku === '',
        ];
    }

    public static function plainText(?string $html, int $max = 5000): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        $html = preg_replace('/<br\s*\/?>/i', "\n", $html) ?? $html;
        $html = preg_replace('/<\/(p|div|li|h[1-6])>/i', "\n", $html) ?? $html;
        $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = str_replace([']]>', "\u{00A0}"], [']] >', ' '], $text);
        $text = self::stripConditionClaims($text);
        $text = preg_replace('/[\x{1F300}-\x{1FAFF}\x{2600}-\x{27BF}\x{FE0F}\x{200D}]/u', '', $text) ?? $text;
        $text = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F]/u', '', $text) ?? $text;
        $text = preg_replace("/[ \t]+/u", ' ', $text) ?? $text;
        $text = preg_replace("/\n[ \t]+/u", "\n", $text) ?? $text;
        $text = preg_replace("/\n{3,}/u", "\n\n", $text) ?? $text;
        $text = trim($text);

        if (mb_strlen($text) <= $max) {
            return $text;
        }

        $cut = rtrim(mb_substr($text, 0, $max - 1));
        $next = mb_substr($text, mb_strlen($cut), 1);
        if ($next !== '' && ! preg_match('/\s/u', $next)) {
            $cut = preg_replace('/\s+\S+$/u', '', $cut) ?? $cut;
        }

        return rtrim($cut).'…';
    }

    /**
     * @return array{0: float, 1: ?float}
     */
    public static function amounts(bool $onSale, float $current, float $regular): array
    {
        if ($onSale && $regular > $current && $current > 0) {
            return [$regular, $current];
        }

        return [$current > 0 ? $current : $regular, null];
    }

    public static function money(float $amount): string
    {
        return number_format($amount, 2, '.', '').' EUR';
    }

    public static function color(string $title, string $locale): ?string
    {
        $ral = null;
        if (preg_match('/\bRAL\s*(\d{4})\b/iu', $title, $match)) {
            $ral = 'RAL '.$match[1];
        }

        $word = null;
        foreach (self::colorWords($locale) as $needle => $label) {
            if (preg_match('/\b'.preg_quote($needle, '/').'\b/iu', $title)) {
                $word = $label;
                break;
            }
        }

        if ($word !== null && $ral !== null) {
            return $word.' '.$ral;
        }

        return $ral ?? $word;
    }

    private static function description(Product $product, string $locale, string $title): string
    {
        $long = $product->getTranslation('description', $locale, false);
        $text = self::plainText(is_string($long) ? $long : null);
        $short = $product->getTranslation('short_description', $locale, false);
        $shortText = self::plainText(is_string($short) ? $short : null);

        if (self::modelsConflict($title, $text) && $shortText !== '' && ! self::modelsConflict($title, $shortText)) {
            return $shortText;
        }

        if (self::modelsConflict($title, $text)) {
            return $title;
        }

        if (mb_strlen($text) < 30 && mb_strlen($shortText) > mb_strlen($text)) {
            $text = $shortText;
        }

        return $text !== '' ? $text : $title;
    }

    /**
     * @return list<string>
     */
    private static function supportingTexts(Product $product): array
    {
        $texts = [];

        foreach (['description', 'short_description'] as $field) {
            foreach ($product->getTranslations($field) as $value) {
                if (is_string($value) && trim($value) !== '') {
                    $texts[] = strip_tags($value);
                }
            }
        }

        return $texts;
    }

    private static function hasOperatingHistory(string $blob): bool
    {
        $year = preg_match('/(?:año|année|annee|year|baujahr)\s+(19|20)\d{2}/u', $blob) === 1;
        $hours = preg_match('/horas de (uso|funcionamiento)|heures de fonctionnement|betriebsstunden/u', $blob) === 1;

        return $year && $hours;
    }

    /**
     * @return list<string>
     */
    private static function modelTokens(string $text): array
    {
        $tokens = [];

        if (preg_match_all('/\bGS\s*-?\s*(\d{3,4})/iu', $text, $matches)) {
            foreach ($matches[1] as $number) {
                $tokens[] = 'GS'.$number;
            }
        }

        if (preg_match_all('/\b(\d{4})\s*RT\b/iu', $text, $matches)) {
            foreach ($matches[1] as $number) {
                $tokens[] = $number.'RT';
            }
        }

        if (preg_match_all('/\bSJ\s*(\d{3,4})/iu', $text, $matches)) {
            foreach ($matches[1] as $number) {
                $tokens[] = 'SJ'.$number;
            }
        }

        return array_values(array_unique($tokens));
    }

    private static function isExcessiveCaps(string $title): bool
    {
        $letters = preg_replace('/[^\p{L}]/u', '', $title) ?? '';
        if (mb_strlen($letters) < 8) {
            return false;
        }

        $upper = preg_replace('/[^\p{Lu}]/u', '', $letters) ?? '';

        return (mb_strlen($upper) / mb_strlen($letters)) >= 0.7;
    }

    private static function toTitleCase(string $lower, string $locale): string
    {
        $small = self::smallWords($locale);
        $words = preg_split('/\s+/u', $lower) ?: [];
        $out = [];

        foreach ($words as $index => $word) {
            $bare = mb_strtolower(trim($word, "()[]«»\"'.,;:–—-"));
            if ($index > 0 && in_array($bare, $small, true)) {
                $out[] = $word;

                continue;
            }

            $out[] = mb_strtoupper(mb_substr($word, 0, 1)).mb_substr($word, 1);
        }

        return implode(' ', $out);
    }

    private static function restoreAcronyms(string $title): string
    {
        $map = [
            'hc' => 'HC',
            'iso' => 'ISO',
            'ral' => 'RAL',
            'pvc' => 'PVC',
            'led' => 'LED',
            'wc' => 'WC',
            'xl' => 'XL',
            'csc' => 'CSC',
            'iicl' => 'IICL',
            'hdpe' => 'HDPE',
            'jlg' => 'JLG',
            'gh' => 'GH',
            'rt' => 'RT',
            'sj' => 'SJ',
        ];

        foreach ($map as $lower => $canon) {
            $title = preg_replace('/\b'.preg_quote($lower, '/').'\b/u', $canon, $title) ?? $title;
        }

        $title = preg_replace('/\bgs(?=\s*-?\s*\d)/iu', 'GS', $title) ?? $title;
        $title = preg_replace('/(\d)\s+[xX]\s+(\d)/u', '$1 x $2', $title) ?? $title;
        $title = preg_replace('/(\d)\s+M\b/u', '$1 m', $title) ?? $title;
        $title = preg_replace('/(?<=\d)es\b/u', 'ES', $title) ?? $title;
        $title = preg_replace('/\bat(?=\d)/iu', 'AT', $title) ?? $title;

        return $title;
    }

    private static function textMarksUsed(string $blob): bool
    {
        $patterns = [
            '/\busad[oa]s?\b/u',
            '/\bocasi[oó]n\b/u',
            '/\bsegunda mano\b/u',
            '/\bseminuev[oa]s?\b/u',
            '/\boccasion\b/u',
            '/\bd\'occasion\b/u',
            '/\bused\b/u',
            '/\bsecond[-\s]?hand\b/u',
            '/\busat[oa]\b/u',
            '/\bgebraucht/u',
            '/\baño\s+(19|20)\d{2}\b/u',
            '/\(\d+\)\s+(19|20)\d{2}\b/u',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $blob)) {
                return true;
            }
        }

        return false;
    }

    private static function handlingCategory(string $title): int
    {
        if (preg_match('/cortac[eé]sped|tondeuse|rasenmäher|lawn mower/u', $title)) {
            return 3311;
        }

        if (preg_match('/transpaleta|apilador|pallet/u', $title)) {
            return 503771;
        }

        if (preg_match('/\bhoist\b|\bguil\b|materiales|matériaux|materialien/u', $title)) {
            return 503768;
        }

        if (preg_match('/tijera|nacelle|plataforma|skyjack|haulotte|\bgenie\b|\bjlg\b|ciseaux/u', $title)) {
            return 503767;
        }

        return 503771;
    }

    /**
     * @return array<string, string>
     */
    private static function manufacturers(): array
    {
        return [
            'castelgarden' => 'Castelgarden',
            'haulotte' => 'Haulotte',
            'skyjack' => 'Skyjack',
            'alpina' => 'Alpina',
            'genie' => 'Genie',
            'intex' => 'Intex',
            'guil' => 'Guil',
            'jlg' => 'JLG',
        ];
    }

    private static function extractMpn(string $brand, string $title): ?string
    {
        $matched = match ($brand) {
            'Genie' => self::firstMatch('/\bGS\s*-?\s*(\d{3,4}[A-Z]{0,2})\b/iu', $title, 'GS-')
                ?? self::firstMatch('/\bGH\b/u', $title, ''),
            'JLG' => self::firstMatch('/\b(\d{4}\s*[A-Z]{1,3})\b/u', $title, ''),
            'Skyjack' => self::firstMatch('/\bSJ\s*([A-Za-z]{0,4}\s*\d{3,4}(?:\s*RT)?)/iu', $title, 'SJ'),
            'Haulotte' => self::firstMatch('/\bOptimum\s*(\d+)\b/iu', $title, 'Optimum '),
            'Guil' => self::firstMatch('/\b(ELC-\d+)\b/iu', $title, ''),
            'Alpina' => self::firstMatch('/\b(AT\d(?:\s+\d+)?(?:\s+[A-Z]{1,3})?)\b/u', $title, ''),
            'Castelgarden' => self::firstMatch('/\b(XDC\s*\d+)\b/iu', $title, ''),
            default => null,
        };

        if ($matched === null) {
            return null;
        }

        $matched = trim(preg_replace('/\s+/u', ' ', $matched) ?? $matched);

        return $matched !== '' ? $matched : null;
    }

    private static function firstMatch(string $pattern, string $title, string $prefix): ?string
    {
        if (! preg_match($pattern, $title, $match)) {
            return null;
        }

        $value = $match[1] ?? $match[0];
        if ($prefix === 'GS-') {
            return 'GS-'.strtoupper(str_replace([' ', '-'], '', $value));
        }

        if ($prefix === 'SJ') {
            return 'SJ'.strtoupper(preg_replace('/\s+/u', '', $value) ?? $value);
        }

        if ($prefix === 'Optimum ') {
            return 'Optimum '.$value;
        }

        return strtoupper($value) === $value ? $value : trim($prefix.$value);
    }

    /**
     * @return list<string>
     */
    private static function smallWords(string $locale): array
    {
        return match ($locale) {
            'es' => ['de', 'del', 'la', 'las', 'el', 'los', 'y', 'e', 'o', 'u', 'a', 'en', 'con', 'por', 'para', 'un', 'una', 'al'],
            'fr' => ['de', 'du', 'des', 'la', 'le', 'les', 'et', 'à', 'au', 'aux', 'en', 'pour', 'par', 'sur', 'un', 'une', 'd'],
            'pt' => ['de', 'da', 'do', 'das', 'dos', 'e', 'em', 'para', 'com', 'por', 'um', 'uma', 'o', 'a', 'os', 'as', 'ao'],
            'en' => ['of', 'the', 'and', 'for', 'with', 'a', 'an', 'to', 'in', 'on', 'or'],
            'it' => ['di', 'del', 'della', 'dei', 'e', 'per', 'con', 'da', 'il', 'la', 'lo', 'un', 'una'],
            'de' => ['und', 'der', 'die', 'das', 'für', 'mit', 'von', 'zu', 'im', 'am', 'auf'],
            default => [],
        };
    }

    /**
     * @return array<string, string>
     */
    private static function colorWords(string $locale): array
    {
        return match ($locale) {
            'fr' => [
                'jaune' => 'Jaune',
                'vert' => 'Vert',
                'verte' => 'Vert',
                'bleu' => 'Bleu',
                'bleue' => 'Bleu',
                'blanc' => 'Blanc',
                'blanche' => 'Blanc',
                'noir' => 'Noir',
                'noire' => 'Noir',
                'gris' => 'Gris',
                'grise' => 'Gris',
                'rouge' => 'Rouge',
                'rose' => 'Rose',
                'orange' => 'Orange',
                'beige' => 'Beige',
            ],
            'pt' => [
                'amarelo' => 'Amarelo',
                'amarela' => 'Amarelo',
                'verde' => 'Verde',
                'azul' => 'Azul',
                'branco' => 'Branco',
                'branca' => 'Branco',
                'preto' => 'Preto',
                'preta' => 'Preto',
                'cinza' => 'Cinza',
                'vermelho' => 'Vermelho',
                'vermelha' => 'Vermelho',
                'rosa' => 'Rosa',
                'laranja' => 'Laranja',
                'bege' => 'Bege',
            ],
            default => [
                'amarillo' => 'Amarillo',
                'amarilla' => 'Amarillo',
                'verde' => 'Verde',
                'azul' => 'Azul',
                'blanco' => 'Blanco',
                'blanca' => 'Blanco',
                'negro' => 'Negro',
                'negra' => 'Negro',
                'gris' => 'Gris',
                'rojo' => 'Rojo',
                'roja' => 'Rojo',
                'rosado' => 'Rosa',
                'rosada' => 'Rosa',
                'rosa' => 'Rosa',
                'naranja' => 'Naranja',
                'beige' => 'Beige',
                'marrón' => 'Marrón',
                'marron' => 'Marrón',
            ],
        };
    }
}
