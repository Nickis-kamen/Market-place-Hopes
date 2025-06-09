<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $shop = Shop::where('user_id', Auth::id())->first();
        return view('vendor.shop.index', compact('shop'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'adresse' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $user = Auth::user();


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/shops','public');
        }else{
            $path = 'uploads/shops/shop_default.jpg';
        }

        Shop::create([
            'name'     => $request->name,
            'user_id'  => $user->id,
            'slug'     => Str::slug($request->name),
            'description'  => $request->description,
            'adresse'  => $request->adresse,
            'image'    => $path,
        ]);
        return redirect('/vendor/shop')->with('success', 'Votre boutique a été créée avec succès.');
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
    public function edit(Shop $shop )
    {
        //
        // $shop = Shop::findOrFail($id);
        return view('vendor.shop.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

        // $shop = Shop::where('user_id', Auth::id())->firstOrFail();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads/shops', 'public');
            $shop->image = $path;
        }

        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->adresse = $request->adresse;
        $shop->slug = Str::slug($request->name);
        $shop->save();

        return redirect('vendor/shop')->with('success', 'Boutique mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
