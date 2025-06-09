<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = Auth::user();
        $categories = Categorie::all();
        $categoryId = $request->query('category_id');

        if($categoryId)
        {
            $products = Product::whereHas('categories',
            function ($query) use ($categoryId)
            {
                $query->where('categories.id', $categoryId);
            })
            ->filter()->orderByRaw('
            CASE 
                WHEN is_boosted = 1 AND boosted_until > NOW() THEN 1
                ELSE 0
            END DESC
            ')->latest()->paginate(9)->withQueryString();
        }else
        {
            $products = Product::filter()->orderByRaw('
            CASE 
                WHEN is_boosted = 1 AND boosted_until > NOW() THEN 1
                ELSE 0
            END DESC
            ')->latest()->paginate(9)->withQueryString();
        }

        $productsCount = $products->total();

        return view('pages.products.index',[
            'user' => $user,
            'products' => $products,
            'productsCount' => $productsCount,
            'categories' => $categories
        ]);
    }

    public function show(Product $product)
    {
        $user = Auth::user();
        return view('pages.products.show', [
            'user' => $user,
            'product' => $product
        ]);
    }
}
