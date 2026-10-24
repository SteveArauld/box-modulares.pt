<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::get('/feeds/google.xml', [FeedController::class, 'google'])->defaults('locale', 'es')->name('feed.google');
Route::get('/feeds/google-{locale}.xml', [FeedController::class, 'google'])->name('feed.google.locale');

Route::get('/sitemap.xml', [ShopController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [ShopController::class, 'robots'])->name('robots');

Route::get('/idioma/{locale}/{routeName}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::post('/contactanos', [ContactController::class, 'send'])->name('shop.contact.send');
Route::post('/mi-cuenta/lost-password', [ShopController::class, 'sendLostPassword'])->name('shop.lost-password.send');
Route::post('/mi-cuenta/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.update');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/finalizar-compra', [OrderController::class, 'store'])->name('shop.checkout.store');

// --- Localized page routes ---
// Every page a visitor can land on / share gets a locale-prefixed, per-locale
// translated URL (see config/route-translations.php). Resolve them from the
// current locale with the `lroute()` helper (app/Support/helpers.php), never
// with the bare `route()` helper.
$slugs = config('route-translations');

foreach (SetLocale::SUPPORTED_LOCALES as $locale) {
    Route::prefix($locale)->name("{$locale}.")->group(function () use ($slugs, $locale): void {
        Route::get('/', [ShopController::class, 'home'])->name('home');

        Route::get('/'.$slugs['shop.index'][$locale], [ShopController::class, 'shopIndex'])->name('shop.index');
        Route::get('/'.$slugs['shop.search'][$locale], [ShopController::class, 'search'])->name('shop.search');

        Route::get('/'.$slugs['product'][$locale].'/{slug}', [ShopController::class, 'shop'])->name('product');
        Route::get('/'.$slugs['category'][$locale].'/{slug}', [ShopController::class, 'category'])->name('category');

        Route::get('/'.$slugs['shop.contact'][$locale], [ShopController::class, 'contact'])->name('shop.contact');
        Route::get('/'.$slugs['shop.shipping-policy'][$locale], [ShopController::class, 'shippingPolicy'])->name('shop.shipping-policy');
        Route::get('/'.$slugs['shop.return-policy'][$locale], [ShopController::class, 'returnPolicy'])->name('shop.return-policy');
        Route::get('/'.$slugs['shop.payment-policy'][$locale], [ShopController::class, 'paymentPolicy'])->name('shop.payment-policy');

        Route::get('/'.$slugs['shop.legal-notice'][$locale], [ShopController::class, 'legalNotice'])->name('shop.legal-notice');
        Route::get('/'.$slugs['shop.terms-of-use'][$locale], [ShopController::class, 'termsOfUse'])->name('shop.terms-of-use');
        Route::get('/'.$slugs['shop.terms-of-sale'][$locale], [ShopController::class, 'termsOfSale'])->name('shop.terms-of-sale');
        Route::get('/'.$slugs['shop.privacy-policy'][$locale], [ShopController::class, 'privacyPolicy'])->name('shop.privacy-policy');
        Route::get('/'.$slugs['shop.cookie-policy'][$locale], [ShopController::class, 'cookiePolicy'])->name('shop.cookie-policy');

        Route::get('/'.$slugs['shop.my-account'][$locale], [ShopController::class, 'myAccount'])->name('shop.my-account');
        Route::get('/'.$slugs['shop.lost-password'][$locale], [ShopController::class, 'lostPassword'])->name('shop.lost-password');
        Route::get('/'.$slugs['password.reset'][$locale].'/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');

        Route::get('/'.$slugs['shop.carrito'][$locale], [ShopController::class, 'carrito'])->name('shop.carrito');
        Route::get('/'.$slugs['shop.checkout'][$locale], [ShopController::class, 'checkout'])->name('shop.checkout');
        Route::get('/'.$slugs['shop.order-confirmation'][$locale].'/{orderNumber}', [ShopController::class, 'orderConfirmation'])->name('shop.order-confirmation');
    });
}

// Bare "/" has no locale in it: send visitors to their browser-preferred
// supported locale (falling back to the app's default locale).
Route::get('/', function () {
    $preferred = request()->getPreferredLanguage(SetLocale::SUPPORTED_LOCALES);
    $locale = in_array($preferred, SetLocale::SUPPORTED_LOCALES, true) ? $preferred : SetLocale::SUPPORTED_LOCALES[0];

    return redirect("/{$locale}/");
})->name('root');
