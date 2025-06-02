<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::filter()->latest()->paginate(8)->withQueryString();
        return view('pages.shops.index',[
            'user' => $user,
            'shops' => $shops,
        ]);
    }
    public function show(Shop $shop)
    {
        $user = Auth::user();
        $vendor = $shop->user;
        return view('pages.shops.show', [
            'user' => $user,
            'shop' => $shop,
            'vendor' => $vendor,
        ]);
    }
}
