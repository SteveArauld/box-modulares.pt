<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Switch the active locale and send the visitor to the equivalent page
     * in that locale (its own translated slug), not just the same URL.
     */
    public function switch(Request $request, string $locale, string $routeName): RedirectResponse
    {
        if (! in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            return redirect()->back();
        }

        $parameters = $request->query();

        // Product/category slugs are per-locale on the model, not in
        // config/route-translations.php — retranslate them for the target
        // locale instead of reusing the current-locale slug.
        if (in_array($routeName, ['product', 'category'], true) && isset($parameters['slug'])) {
            $currentLocale = app()->getLocale();
            $query = $routeName === 'product' ? Product::query() : Category::query();

            $model = $query->get()->first(
                fn ($candidate) => $candidate->getTranslation('slug', $currentLocale, false) === $parameters['slug']
            );

            if ($model) {
                $parameters['slug'] = $model->getTranslation('slug', $locale, false) ?: $model->getTranslation('slug', 'es', false);
            }
        }

        try {
            return redirect(lroute($routeName, $parameters, true, $locale));
        } catch (\Throwable) {
            return redirect("/{$locale}/");
        }
    }
}
