<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function index()
    {
        // dd(session()->get('cart', []));
        $user = Auth::user();
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('pages.cart.index', compact('cart', 'total', 'user'));
    }

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if (!Auth::check()) {
            return redirect()->route('auth.login')->with('error', 'Vous devez être connecté pour ajouter au panier.');
        }


        $cart = session()->get('cart', []);
        $cart[$product->id] = [
            "product" => $product,
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image,
            "vendor_id" => $product->shop->user_id
        ];

        session()->put('cart', $cart);

        return back()->with('success', 'Produit ajouté au panier !');
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return redirect()->back()->with('error', 'Produit introuvable dans le panier.');
        }

        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        if ($request->action === 'increase') {
            if ($cart[$id]['quantity'] < $product->quantity) {
                $cart[$id]['quantity'] += 1;
            } else {
                return redirect()->back()->with('error', 'Stock maximum atteint.');
            }
        }

        if ($request->action === 'decrease') {
            $cart[$id]['quantity'] = max(1, $cart[$id]['quantity'] - 1);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Quantité mise à jour.');
    }
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }

}
