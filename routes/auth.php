<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest') -> group(function () {

    Route::get('/login', [LoginController::class, 'showLogin']) -> name('auth.login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register/customer', [RegisterController::class, 'showCustomerForm']) -> name('auth.register.customer');
    Route::post('/register/customer', [RegisterController::class, 'registerCustomer']);

    Route::get('/register/vendor', [RegisterController::class, 'showVendorForm']) -> name('auth.register.vendor');
    Route::post('/register/vendor', [RegisterController::class, 'registerVendor']);

});

Route::post('/logout', [LoginController::class, 'logout']) -> name('logout.store');
