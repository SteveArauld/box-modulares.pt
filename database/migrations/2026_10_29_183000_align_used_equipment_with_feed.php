<?php

use App\Models\Product;
use App\Support\GoogleMerchantItem;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Mark machines with a year and operating hours as used, and stop
     * publishing a long description that names a different model.
     */
    public function up(): void
    {
        Product::query()->orderBy('id')->each(function (Product $product): void {
            $extra = [];
            foreach (['description', 'short_description'] as $field) {
                foreach ($product->getTranslations($field) as $value) {
                    if (is_string($value)) {
                        $extra[] = strip_tags($value);
                    }
                }
            }

            $changed = false;
            $condition = GoogleMerchantItem::detectCondition(
                $product->getTranslations('name'),
                (string) $product->condition,
                $extra,
            );

            if ($condition !== $product->condition) {
                $product->condition = $condition;
                $changed = true;
            }

            $descriptions = $product->getTranslations('description');
            $descriptionsChanged = false;

            foreach ($descriptions as $locale => $html) {
                if (! is_string($html) || trim($html) === '') {
                    continue;
                }

                $title = $product->getTranslation('name', (string) $locale, false);
                if (! is_string($title) || $title === '') {
                    continue;
                }

                $plain = strip_tags($html);
                if (GoogleMerchantItem::modelsConflict($title, $plain)) {
                    $short = $product->getTranslation('short_description', (string) $locale, false);
                    $shortPlain = is_string($short) ? trim(strip_tags($short)) : '';
                    $descriptions[$locale] = $shortPlain !== '' && ! GoogleMerchantItem::modelsConflict($title, $shortPlain)
                        ? '<p>'.e(GoogleMerchantItem::stripConditionClaims($shortPlain)).'</p>'
                        : '<p>'.e($title).'</p>';
                    $descriptionsChanged = true;

                    continue;
                }

                if (preg_match('/pr[aá]cticamente nuev|pratiquement neu|praticamente nuov|praktisch neu|practically new/iu', $html)) {
                    $descriptions[$locale] = GoogleMerchantItem::stripConditionClaims($html);
                    $descriptionsChanged = true;
                }
            }

            if ($descriptionsChanged) {
                $product->setTranslations('description', $descriptions);
                $changed = true;
            }

            if ($changed) {
                $product->save();
            }
        });
    }

    public function down(): void
    {
        // The replaced descriptions were naming a different model than the title.
    }
};
