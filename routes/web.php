<?php

declare(strict_types=1);

use App\Http\Controllers\ShopAccountController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\ShopCheckoutController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/sports/{sport}', [SportController::class, 'show'])->name('sports.show');

Route::get('/catalog', [ShoppingController::class, 'catalog'])->name('shop.catalog');
Route::get('/catalog/products/{id}', [ShoppingController::class, 'product'])->whereNumber('id')->name('shop.product');

Route::get('/cart', [ShopCartController::class, 'index'])->name('shop.cart');
Route::post('/cart/add', [ShopCartController::class, 'add'])->name('shop.cart.add');
Route::patch('/cart/{cartId}', [ShopCartController::class, 'update'])->whereNumber('cartId')->name('shop.cart.update');
Route::delete('/cart/{cartId}', [ShopCartController::class, 'remove'])->whereNumber('cartId')->name('shop.cart.remove');

Route::get('/login', [ShopAccountController::class, 'loginForm'])->name('shop.login');
Route::post('/login', [ShopAccountController::class, 'login'])->middleware('throttle:8,1')->name('shop.login.submit');
Route::get('/register', [ShopAccountController::class, 'registerForm'])->name('shop.register');
Route::post('/register', [ShopAccountController::class, 'register'])->middleware('throttle:5,1')->name('shop.register.submit');
Route::post('/logout', [ShopAccountController::class, 'logout'])->name('shop.logout');
Route::get('/profile', [ShopAccountController::class, 'profile'])->name('shop.profile');
Route::patch('/profile', [ShopAccountController::class, 'updateProfile'])->name('shop.profile.update');
Route::get('/my-orders', [ShopAccountController::class, 'orderHistory'])->name('shop.orders');
Route::get('/my-orders/{id}', [ShopAccountController::class, 'order'])->whereNumber('id')->name('shop.order');

Route::get('/checkout', [ShopCheckoutController::class, 'checkout'])->name('shop.checkout');
Route::post('/checkout/billing', [ShopCheckoutController::class, 'saveBilling'])->name('shop.checkout.billing');
Route::get('/checkout/payment', [ShopCheckoutController::class, 'paymentPage'])->name('shop.payment');
Route::post('/checkout/payment', [ShopCheckoutController::class, 'placeOrder'])->middleware('throttle:3,1')->name('shop.payment.submit');
Route::get('/checkout/success', [ShopCheckoutController::class, 'success'])->name('shop.success');
