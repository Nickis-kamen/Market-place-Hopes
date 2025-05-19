<?php

use App\Http\Controllers\vendor\DashboardController;
use App\Http\Controllers\vendor\OrderController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\ShopController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'vendor', 'prefix' => 'vendor', 'as' => 'vendor.'],function()
{
    Route::get('dashboard', [DashboardController::class, 'index']) -> name('dashboard.index');
    Route::resource('products', ProductController::class);
    Route::resource('shop', ShopController::class);
    Route::get('orders', [OrderController::class, 'index']) -> name('orders.index');
});
