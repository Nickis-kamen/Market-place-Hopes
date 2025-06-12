<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //
    public function index()
    {
        $shops = Shop::all();
        return view ('admin.shop.index', compact('shops'));
    }
    public function show(Shop $shop)
    {
        return view('admin.shop.show', [
            'shop' => $shop,
        ]);
    }

}
