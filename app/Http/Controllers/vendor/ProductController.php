<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Boost;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stripe\StripeClient;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function boost(Request $request, Product $product)
    {
        // dd('aaaaaaaa');
        $request->validate([
            'duration' => 'required|integer|min:1|max:30',
        ]);

        $user = Auth::user();
        if ($product->shop->user_id !== $user->id) {
            abort(403);
        }

        $boostPrice = 5000 * $request->duration;


        $stripe = new StripeClient(config('services.stripe.secret'));
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'MGA',
                    'product_data' => [
                        'name' => "Boost produit: {$product->title} ({$request->duration} jours)",
                    ],
                    'unit_amount' => $boostPrice,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'customer_email' => $request->user()->email,
            'success_url' => route('vendor.products.boost.success', ['duration' => $request->duration, $product, 'amount' => $boostPrice]),
            'cancel_url' => route('vendor.products.edit', $product),
        ]);

        return redirect($session->url);
    }

    public function boostSuccess(Request $request, Product $product)
    {
        $duration = (int) $request->duration;
        $amount = (int) $request->amount;
        // $product = $request->product;
        $user = Auth::user();

        // dd($product);

        if ($product->shop->user_id !== $user->id) {
            abort(403);
        }

        $product->update([
            'is_boosted' => true,
            'boosted_until' => now()->addDays($duration),
        ]);

        $boost = Boost::create([
            'product_id' => $product->id,
            'user_id' => $user->id,
            'amount' => $amount,
            'duration_days' => $duration,
            'starts_at' => now(),
            'ends_at' => now()->addDays($duration),
        ]);
        return redirect()->route('vendor.products.index')->with('success', "Le produit a été boosté pour {$duration} jour(s) !");
    }
    public function index()
    {
        //
        $shop = Shop::where('user_id', Auth::id())->first();


        if($shop){
            $products = Product::where('shop_id', $shop->id)->latest()->get();
            return view('vendor.products.index', [
                'shop' => $shop,
                'products' => $products
            ]);
        }
        return view('vendor.products.index', [
                'shop' => $shop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product = Shop::where('user_id', Auth::id())->first();
        $categories = Categorie::all();
        $stripeId = User::whereNotNull('stripe_account_id')->where('id', Auth::id())->first();

        return view('vendor.products.create',[
            'shop' => $product,
            'stripeId' => $stripeId,
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
            'title' => 'required|string|max:255|regex:/^[\pL\s0-9]+$/u',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categories' => 'required|array',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:100',
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
    public function edit(Product $product)
    {
        //
        $categoriesAll = Categorie::all();
        $categories = $product->categories;
        return view('vendor.products.edit', compact('product','categories', 'categoriesAll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255|regex:/^[\pL\s0-9]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categories' => 'required|array',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:100',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/products', 'public');
            $product->image = $path;
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->slug = Str::slug($request->title);
        $product->save();

        // Synchronisation des catégories (remplace les anciennes)
        $product->categories()->sync($request->categories);

        return redirect()->route('vendor.products.index')->with('success', 'Produit mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        // Détacher les catégories
        $product->categories()->detach();

        // Supprimer le produit
        $product->delete();

        return redirect()->route('vendor.products.index')->with('success', 'Produit supprimé avec succès.');
    }



}
