<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index(){

        $user = Auth::user();
        $products = Product::limit(12)->latest()->get();
        $categories = Categorie::all();
        return view('pages.home.index',[
            'user' => $user,
            'products' => $products,
            'categories' => $categories
        ]);

    }
}
