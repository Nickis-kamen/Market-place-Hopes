<?php

use App\Http\Controllers\vendor\DashboardController;
use App\Http\Controllers\vendor\OrderController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\ShopController;
use App\Http\Controllers\vendor\StripeController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'vendor', 'prefix' => 'vendor', 'as' => 'vendor.'],function()
{
    Route::get('dashboard', [DashboardController::class, 'index']) -> name('dashboard.index');
    Route::resource('products', ProductController::class);
    Route::resource('shop', ShopController::class);
    Route::get('orders', [OrderController::class, 'index']) -> name('orders.index');


    Route::get('stripe', [StripeController::class, 'index'])->name('stripe');
    Route::get('stripe/connect', [StripeController::class, 'createStripeAccount'])->name('stripe.connect');
    Route::get('stripe/delete', [StripeController::class, 'deleteStripeAccount'])->name('stripe.delete');
    Route::get('stripe/login', [StripeController::class, 'accessStripeExpress'])->name('stripe.login');
    Route::get('stripe/account/refresh', function () {
        return redirect()->route('stripe.connect');
    })->name('stripe.account.refresh');

});
