<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Categorie::all();
        $shops = Shop::all();
        $categoryId = $request->query('category');
        $boutiqueId = $request->query('shop');

        $products = Product::query()
            ->when($categoryId, function ($query, $categoryId) {
                $query->whereHas('categories', function ($q) use ($categoryId) {
                    $q->where('categories.id', $categoryId);
                });
            })
            ->when($boutiqueId, function ($query, $boutiqueId) {
                $query->where('shop_id', $boutiqueId);
            })
            ->filter() // ← Si tu as un scope de recherche, par exemple "search"
            ->latest()
            ->paginate(9)
            ->withQueryString();


        return view ('admin.product.index', compact('products','shops','categories'));
    }
    public function show(Product $product)
    {
        return view('admin.product.show', [
            'product' => $product,
        ]);
    }
}
