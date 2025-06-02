<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $categories = Categorie::filter()->latest()->paginate(8)->withQueryString();
        return view('pages.categories.index',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }
    public function show(Categorie $category)
    {
        $products = $category->products()->filter()->latest()->paginate(8)->withQueryString();
        $user = Auth::user();
        return view('pages.categories.show', [
            'user' => $user,
            'category' => $category,
            'products' => $products,
        ]);
    }
}
