<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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


Route::group(['middleware' => 'customer'],function()
{
    Route::get('/account', [AccountController::class, 'index']) -> name('account.index');
    Route::post('/rating', [RatingController::class, 'store']) -> name('ratings.store');
    Route::post('/ratingshop', [RatingController::class, 'storeShop']) -> name('ratingsShop.store');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

});



include __DIR__. '/auth.php';
include __DIR__. '/vendor.php';
include __DIR__. '/admin.php';

