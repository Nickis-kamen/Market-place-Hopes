<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Vous devez être connecté pour ajouter au panier.');
        }
        $cart = session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "title" => $product->title,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        // dd($cart);
        session()->put('cart', $cart);

        return back()->with('success', 'Produit ajouté au panier !');
    }

}
