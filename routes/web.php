<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\auth\ProfilController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']) -> name('index');

Route::get('/products', [ProductController::class, 'index']) -> name('products.index');
Route::get('/product/{product}', [ProductController::class, 'show']) -> name('product.show');

Route::get('/categories', [CategoryController::class, 'index']) -> name('categories.index');
Route::get('/category/{category}', [CategoryController::class, 'show']) -> name('category.show');

Route::get('/shops', [ShopController::class, 'index']) -> name('shops.index');
Route::get('/shop/{shop}', [ShopController::class, 'show']) -> name('shop.show');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');



Route::group(['middleware' => 'customer'],function()
{
    Route::get('/account', [AccountController::class, 'index']) -> name('account.index');
    Route::post('/rating', [RatingController::class, 'store']) -> name('ratings.store');
    Route::post('/ratingshop', [RatingController::class, 'storeShop']) -> name('ratingsShop.store');
    Route::get('/cart', [CartController::class, 'index']) -> name('cart.index');
    Route::post('/cart/{id}', [CartController::class, 'update']) -> name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove']) -> name('cart.remove');
    Route::get('/checkout', [CheckoutController::class, 'checkout']) -> name('checkout');
    Route::post('/checkout-session', [CheckoutController::class, 'createCheckoutSession'])->name('checkout.session');

    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('profile/password', [ProfilController::class, 'customer'])->name('password');
    Route::get('profile/informations', [ProfilController::class, 'infoCustomer'])->name('info');
    Route::get('profile/informations/edit', [ProfilController::class, 'editCustomer'])->name('edit');
    Route::post('profile/infromations/update', [ProfilController::class, 'updateInfo'])->name('update-info');
    Route::post('profile/password/update', [ProfilController::class, 'updatePassword'])->name('update-password');

});



include __DIR__. '/auth.php';
include __DIR__. '/vendor.php';
include __DIR__. '/admin.php';

