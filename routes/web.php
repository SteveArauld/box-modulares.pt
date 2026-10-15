<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'home'])->name('home');

Route::get('/idioma/{locale}', [LocaleController::class, 'switch'])->name('locale.switch');

Route::get('/tienda', [ShopController::class, 'shopIndex'])->name('shop.index');
Route::get('/buscar', [ShopController::class, 'search'])->name('shop.search');

Route::get('/producto/{slug}', [ShopController::class, 'shop'])->name('product');
Route::get('/categoria-producto/{slug}', [ShopController::class, 'category'])->name('category');

Route::get('/contactanos', [ShopController::class, 'contact'])->name('shop.contact');
Route::post('/contactanos', [ContactController::class, 'send'])->name('shop.contact.send');
Route::get('/politica-de-envios', [ShopController::class, 'shippingPolicy'])->name('shop.shipping-policy');
Route::get('/politica-de-devoluciones-y-reembolsos', [ShopController::class, 'returnPolicy'])->name('shop.return-policy');
Route::get('/politica-de-pago', [ShopController::class, 'paymentPolicy'])->name('shop.payment-policy');

// --- Legal Information ---
Route::get('/aviso-legal', [ShopController::class, 'legalNotice'])->name('shop.legal-notice');
Route::get('/condiciones-generales-de-uso-cgu', [ShopController::class, 'termsOfUse'])->name('shop.terms-of-use');
Route::get('/condiciones-generales-de-venta', [ShopController::class, 'termsOfSale'])->name('shop.terms-of-sale');
Route::get('/politica-de-privacidad', [ShopController::class, 'privacyPolicy'])->name('shop.privacy-policy');
Route::get('/politica-de-cookies', [ShopController::class, 'cookiePolicy'])->name('shop.cookie-policy');

Route::get('/mi-cuenta', [ShopController::class, 'myAccount'])->name('shop.my-account');
Route::get('/mi-cuenta/lost-password', [ShopController::class, 'lostPassword'])->name('shop.lost-password');
Route::post('/mi-cuenta/lost-password', [ShopController::class, 'sendLostPassword'])->name('shop.lost-password.send');
Route::get('/mi-cuenta/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/mi-cuenta/reset-password', [AuthController::class, 'resetPassword'])->name('password.reset.update');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/carrito', [ShopController::class, 'carrito'])->name('shop.carrito');

Route::get('/finalizar-compra', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::post('/finalizar-compra', [OrderController::class, 'store'])->name('shop.checkout.store');
Route::get('/finalizar-compra/pedido-recibido/{orderNumber}', [ShopController::class, 'orderConfirmation'])->name('shop.order-confirmation');
