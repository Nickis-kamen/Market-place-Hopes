<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $shop = Shop::where('user_id', Auth::id())->first();
        $products = Product::where('shop_id', $shop->id)->get();
        return view('vendor.products.index', [
            'shop' => $shop,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $shop = Shop::where('user_id', Auth::id())->first();
        $categories = Categorie::all();

        return view('vendor.products.create',[
            'shop' => $shop,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categories' => 'required|array',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1'
        ]);

        $file = $request->file('image');
        $path = $file->store('uploads/products','public');

        $product = Product::create([
            'shop_id' => $request->shop_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $path
        ]);

        $product->categories()->attach($request->categories);
        // $categories = $request->categories;

        //     foreach ($categories as $categoryId)
        //     {
        //         $category = Categorie::find($categoryId);

        //         if($category)
        //         {
        //             $category->products()->attach($product->id);
        //         }

        //     }
        return redirect('/vendor/products')->with('success', 'Votre produit a été créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
