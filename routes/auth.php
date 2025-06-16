<?php

use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest') -> group(function () {

    Route::get('/login', [LoginController::class, 'showLogin']) -> name('auth.login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register/customer', [RegisterController::class, 'showCustomerForm']) -> name('auth.register.customer');
    Route::post('/register/customer', [RegisterController::class, 'registerCustomer']);

    Route::get('/register/vendor', [RegisterController::class, 'showVendorForm']) -> name('auth.register.vendor');
    Route::post('/register/vendor', [RegisterController::class, 'registerVendor']);

    Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

});

Route::get('/verify-email/{token}', [LoginController::class, 'verifyEmail'])->name('verify.email');

Route::post('/logout', [LoginController::class, 'logout']) -> name('logout.store');
