<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public const SUPPORTED_LOCALES = ['fr', 'pt', 'es'];

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()?->getName();
        $routeLocale = is_string($routeName) ? strtok($routeName, '.') : null;

        if (is_string($routeLocale) && in_array($routeLocale, self::SUPPORTED_LOCALES, true)) {
            app()->setLocale($routeLocale);
            $request->session()->put('locale', $routeLocale);

            return $next($request);
        }

        // Non-localized routes (POST actions, feeds, sitemap, ...) fall back
        // to whatever locale the visitor was last browsing in.
        $locale = $request->session()->get('locale');

        if (is_string($locale) && in_array($locale, self::SUPPORTED_LOCALES, true)) {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
