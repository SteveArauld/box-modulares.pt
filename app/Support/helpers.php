<?php

use App\Http\Middleware\SetLocale;

if (! function_exists('lroute')) {
    /**
     * Resolve a locale-prefixed "page" route (see routes/web.php and
     * config/route-translations.php) for the given or current locale,
     * e.g. lroute('shop.privacy-policy') or lroute('product', $slug).
     *
     * @param  mixed  $parameters
     */
    function lroute(string $name, $parameters = [], bool $absolute = true, ?string $locale = null): string
    {
        $locale = $locale ?: app()->getLocale();

        if (! in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            $locale = SetLocale::SUPPORTED_LOCALES[0];
        }

        return route("{$locale}.{$name}", $parameters, $absolute);
    }
}
