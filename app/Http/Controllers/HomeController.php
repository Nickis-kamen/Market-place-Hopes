<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function index(){

        $user = Auth::user();
        $products = Product::filter()
        ->orderByRaw('
            CASE
                WHEN is_boosted = 1 AND boosted_until > NOW() THEN 1
                ELSE 0
            END DESC
        ')
        ->latest()
        ->limit(12)
        ->get();

        $popularProducts = Product::withAvg('ratings', 'rating')
        ->having('ratings_avg_rating', '>=', 4)
        ->take(6)
        ->get();

        $shops = Shop::all();
        $categories = Categorie::all();

        return view('pages.home.index',[
            'user' => $user,
            'products' => $products,
            'productsPopulaire' => $popularProducts,
            'shops' => $shops,
            'categories' => $categories
        ]);

    }
}
