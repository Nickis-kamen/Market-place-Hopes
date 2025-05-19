<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class HomeController extends Controller
{
    //
    public function index(){

        return view('pages.home.index');

    }
}
