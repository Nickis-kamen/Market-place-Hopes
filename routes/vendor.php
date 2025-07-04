<?php

use App\Http\Controllers\auth\ProfilController;
use App\Http\Controllers\vendor\CustomerController;
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
    Route::post('products/{product}/boost', [ProductController::class, 'boost'])->name('products.boost');
    Route::get('products/boost/success/{product}', [ProductController::class, 'boostSuccess'])->name('products.boost.success');

    Route::resource('shop', ShopController::class);
    Route::get('orders', [OrderController::class, 'index']) -> name('orders.index');
    Route::post('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('stripe', [StripeController::class, 'index'])->name('stripe');
    Route::get('stripe/connect', [StripeController::class, 'createStripeAccount'])->name('stripe.connect');
    Route::get('stripe/delete', [StripeController::class, 'deleteStripeAccount'])->name('stripe.delete');
    Route::get('stripe/login', [StripeController::class, 'accessStripeExpress'])->name('stripe.login');
    Route::get('stripe/account/refresh', function () {
        return redirect()->route('stripe.connect');
    })->name('stripe.account.refresh');

    Route::get('profile/password', [ProfilController::class, 'vendor'])->name('password');
    Route::get('profile/informations', [ProfilController::class, 'infoVendor'])->name('info');
    Route::get('profile/informations/edit', [ProfilController::class, 'editVendor'])->name('edit');
    Route::post('profile/infromations/update', [ProfilController::class, 'updateInfo'])->name('update-info');
    Route::post('profile/password/update', [ProfilController::class, 'updatePassword'])->name('update-password');

    Route::get('customer/{customer}/show', [CustomerController::class, 'show'])->name('customer.show');
});
