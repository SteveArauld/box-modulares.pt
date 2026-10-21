<?php
// database/data/generate_slugs.php

$file = __DIR__ . '/products copy.json';

if (!is_file($file)) {
    fwrite(STDERR, "Fichier introuvable : $file\n");
    exit(1);
}

$json = json_decode(file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);

/**
 * Transforme une chaîne en slug : minuscules, sans accents, tirets.
 * ex: "Capanno da Giardino Artisan 340×226 cm – 7,68 m²"
 *  -> "capanno-da-giardino-artisan-340x226-cm-768-m2"
 */
function slugify(string $text): string
{
    // Remplace les caractères accentués par leur équivalent ASCII
    $text = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);

    // Minuscules
    $text = strtolower($text);

    // Remplace tout ce qui n'est pas lettre/chiffre par un tiret
    $text = preg_replace('/[^a-z0-9]+/', '-', $text);

    // Supprime les tirets en début/fin et les doublons
    $text = trim($text, '-');
    $text = preg_replace('/-+/', '-', $text);

    return $text;
}

$languages = ['it', 'es', 'de', 'pt'];
$count = 0;
$warnings = [];

foreach ($json['products'] as &$product) {
    // Sécurité : on a besoin du name pour générer les slugs
    if (!is_array($product['name'] ?? null)) {
        $warnings[] = "Produit sans 'name' : " . ($product['sku'] ?? '?');
        continue;
    }

    $newSlug = [];

    foreach ($languages as $lang) {
        $name = $product['name'][$lang] ?? null;

        if (!is_string($name) || trim($name) === '') {
            $warnings[] = "Nom manquant en '$lang' pour : " . ($product['sku'] ?? '?');
            $newSlug[$lang] = '';
            continue;
        }

        $newSlug[$lang] = slugify($name);
    }

    $product['slug'] = $newSlug;
    $count++;
}

file_put_contents(
    $file,
    json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
);

echo "OK — $count produits traités.\n";

if (!empty($warnings)) {
    echo "\nAvertissements (" . count($warnings) . ") :\n";
    foreach (array_slice($warnings, 0, 20) as $w) {
        echo " - $w\n";
    }
    if (count($warnings) > 20) {
        echo " ... et " . (count($warnings) - 20) . " autres.\n";
    }
}