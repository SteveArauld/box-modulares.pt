<?php

use App\Models\Product;
use App\Support\GoogleMerchantItem;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Align stored titles and condition with the product feed.
     * Landing pages read these columns, so the page and the feed stay identical.
     */
    public function up(): void
    {
        Product::query()->orderBy('id')->each(function (Product $product): void {
            $names = $product->getTranslations('name');
            $changed = false;

            foreach ($names as $locale => $name) {
                if (! is_string($name)) {
                    continue;
                }

                $next = GoogleMerchantItem::normalizeTitle($name, (string) $locale);
                if ($next !== $name) {
                    $names[$locale] = $next;
                    $changed = true;
                }
            }

            $condition = GoogleMerchantItem::detectCondition($names, (string) $product->condition);

            if ($condition !== $product->condition) {
                $product->condition = $condition;
                $changed = true;
            }

            if (! $changed) {
                return;
            }

            $product->setTranslations('name', $names);
            $product->save();
        });
    }

    public function down(): void
    {
        // Title casing and condition corrections are not reversible from the feed rules.
    }
};
