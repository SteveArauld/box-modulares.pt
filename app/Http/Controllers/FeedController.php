<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class FeedController extends Controller
{
    private const SUPPORTED_LOCALES = ['es', 'fr', 'pt', 'en', 'it', 'de'];

    private const CATEGORY_GMC_IDS = [
        'contenedores-maritimos'           => 5842,  // Shipping Containers
        'contenedores-de-envio'            => 5842,
        'contenedores-maritimos-de-20-pies' => 5842,
        'contenedores-maritimos-de-40-pies' => 5842,
        'casas-modulares'                  => 696,   // Modular Homes
        'casas-moviles'                    => 696,
        'casas-moviles-prefabricadas'      => 696,
        'casetas-de-obra-y-modulos-sanitarios' => 696,
        'bar-contenedor'                   => 5842,
        'piscina-contenedor'               => 2901,  // Swimming Pools
        'plataformas-elevadoras'           => 1810,  // Utility Trailers
    ];

    public function google(string $locale = 'es'): Response
    {
        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            abort(404);
        }

        $xml = Cache::remember("feed.google.{$locale}", now()->addHours(12), function () use ($locale) {
            app()->setLocale($locale);

            $products = Product::query()
                ->with('category')
                ->whereHas('category', fn ($q) => $q->where('is_visible', true))
                ->get();

            return view('feeds.google', [
                'products' => $products,
                'locale'   => $locale,
                'appUrl'   => config('app.url'),
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type'  => 'application/xml; charset=utf-8',
            'Cache-Control' => 'public, max-age=43200',
        ]);
    }
}
