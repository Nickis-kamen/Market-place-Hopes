<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\RatingsShop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    //
    public function store(Request $request)
    {
        $user= Auth::user();
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $existing = Rating::where('user_id', $user->id)
                      ->where('product_id', $request->product_id)
                      ->first();

        if ($existing) {
            return back()->with('error', 'Vous avez déjà mis une note.');
        }

        Rating::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Merci pour votre avis !');
    }

    public function storeShop(Request $request)
    {
        $user= Auth::user();
        $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $existing = RatingsShop::where('user_id', $user->id)
                      ->where('shop_id', $request->shop_id)
                      ->first();

        if ($existing) {
            return back()->with('error', 'Vous avez déjà noté ce produit.');
        }

        RatingsShop::create([
            'user_id' => $user->id,
            'shop_id' => $request->shop_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Merci pour votre avis !');
    }
}
