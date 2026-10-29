<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Support\GoogleMerchantItem;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class FeedController extends Controller
{
    public const SUPPORTED_LOCALES = ['es', 'fr', 'pt'];

    public function google(string $locale = 'es'): Response
    {
        if (! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            abort(404);
        }

        $xml = Cache::remember("feed.google.v3.{$locale}", now()->addHours(12), function () use ($locale) {
            app()->setLocale($locale);

            $items = Product::query()
                ->with('category')
                ->whereHas('category', fn ($q) => $q->where('is_visible', true))
                ->get()
                ->map(fn (Product $product) => GoogleMerchantItem::fromProduct($product, $locale))
                ->filter()
                ->values();

            $shipping = config('company.shipping');

            return view('feeds.google', [
                'items' => $items,
                'locale' => $locale,
                'appUrl' => rtrim((string) config('app.url'), '/'),
                'shippingFee' => number_format((float) ($shipping['fee'] ?? 400), 2, '.', ''),
                'shippingZones' => $shipping['zones'] ?? ['PT', 'ES'],
                'handlingMin' => (int) ($shipping['preparation_days_min'] ?? 2),
                'handlingMax' => (int) ($shipping['preparation_days_max'] ?? 3),
                'transitMin' => (int) ($shipping['delivery_days_min'] ?? 3),
                'transitMax' => (int) ($shipping['delivery_days_max'] ?? 6),
            ])->render();
        });

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'Cache-Control' => 'public, max-age=43200',
        ]);
    }
}
