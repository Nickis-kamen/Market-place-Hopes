<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $user= Auth::user();
        $orders = Order::with('items.product', 'vendor')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('pages.orders.index', [
            'orders' => $orders,
            'user' => $user,
        ]);
    }

}
