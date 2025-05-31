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
        $categories = Categorie::all();
        return view('pages.categories.index',[
            'user' => $user,
            'categories' => $categories,
        ]);
    }
}
