<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']) -> name('index');

Route::group(['middleware' => 'customer'],function()
{
    Route::get('/account', [AccountController::class, 'index']) -> name('account.index');
    
});



include __DIR__. '/auth.php';
include __DIR__. '/vendor.php';
include __DIR__. '/admin.php';

