<?php

use App\Http\Controllers\admin\BoostController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\ProfilController;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'],function()
{

    Route::get('dashboard', [DashboardController::class, 'index']) -> name('dashboard.index');
    Route::get('customers', [UserController::class, 'showCustomer']) -> name('customers.index');
    Route::get('vendors', [UserController::class, 'showVendor']) -> name('vendors.index');
    Route::get('user/{id}/show', [UserController::class, 'show']) -> name('user.show');
    Route::resource('categories', CategoryController::class);
    Route::get('products', [ProductController::class, 'index']) -> name('products.index');
    Route::get('product/{product}/show', [ProductController::class, 'show']) -> name('product.show');
    Route::get('shops', [ShopController::class, 'index']) -> name('shops.index');
    Route::get('shop/{shop}/show', [ShopController::class, 'show']) -> name('shop.show');
    Route::get('orders', [OrderController::class, 'index']) -> name('orders.index');
    Route::get('order/{order}/show', [OrderController::class, 'show']) -> name('order.show');
    Route::get('order/{order}/pdf', [OrderController::class, 'generatePdf'])->name('order.pdf');

    Route::get('boosts', [BoostController::class, 'index']) -> name('boosts.index');
    Route::post('boosts/{boost}/approve', [BoostController::class, 'approve'])->name('boost.approve');

    Route::get('profile/password', [ProfilController::class, 'admin'])->name('password');
    Route::post('profile/password/update', [ProfilController::class, 'updatePassword'])->name('update-password');

});
