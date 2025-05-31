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
        $products = Product::filter()->limit(12)->latest()->get();
        $popularProducts = Product::withAvg('ratings', 'rating')
        ->having('ratings_avg_rating', '>=', 4)
        ->take(6)
        ->get();

        $categories = Categorie::all();
        return view('pages.home.index',[
            'user' => $user,
            'products' => $products,
            'productsPopulaire' => $popularProducts,
            'categories' => $categories
        ]);

    }
}
