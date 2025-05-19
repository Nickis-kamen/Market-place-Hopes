<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']) -> name('home.index');


include __DIR__. '/auth.php';
include __DIR__. '/vendor.php';
include __DIR__. '/admin.php';

