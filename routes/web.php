<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']) -> name('index');

Route::get('/products', [ProductController::class, 'index']) -> name('products.index');
Route::get('/product/{product}', [ProductController::class, 'show']) -> name('product.show');

Route::get('/categories', [CategoryController::class, 'index']) -> name('categories.index');


Route::group(['middleware' => 'customer'],function()
{
    Route::get('/account', [AccountController::class, 'index']) -> name('account.index');
    Route::post('/rating', [RatingController::class, 'store']) -> name('ratings.store');
});



include __DIR__. '/auth.php';
include __DIR__. '/vendor.php';
include __DIR__. '/admin.php';

