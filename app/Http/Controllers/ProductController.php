<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('products.index',[
            'user' => $user,
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
