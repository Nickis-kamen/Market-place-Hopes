<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShopController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'],function()
{

    Route::get('dashboard', [DashboardController::class, 'index']) -> name('dashboard.index');
    Route::get('customers', [UserController::class, 'showCustomer']) -> name('customers.index');
    Route::get('vendors', [UserController::class, 'showVendor']) -> name('vendors.index');
    Route::get('user/{id}/show', [UserController::class, 'show']) -> name('user.show');
    Route::resource('categories', CategoryController::class);
    Route::get('products', [ProductController::class, 'index']) -> name('products.index');
    Route::get('shops', [ShopController::class, 'index']) -> name('shops.index');
    Route::get('shop/{shop}/show', [ShopController::class, 'show']) -> name('shop.show');
    Route::get('orders', [OrderController::class, 'index']) -> name('orders.index');

});
