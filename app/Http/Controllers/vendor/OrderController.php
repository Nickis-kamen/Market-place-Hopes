<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $vendorId = Auth::user();
        // $orders = Order::where('vendor_id', $vendorId->id)->get();
        // dd($orders);
        $orders = Order::where('vendor_id', $vendorId->id)
                        ->with('items.product')
                        ->orderByDesc('created_at')
                        ->get();
        // dd($orders);
        return view('vendor.orders.index',[
            'orders' => $orders
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $user = Auth::user();
        if ($order->vendor_id !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'status' => 'required|in:paid,unpaid',
        ]);

        $order->status = $validated['status'];
        $order->save();

        return redirect()->route('vendor.orders.index')->with('success', 'Statut de la commande mis à jour.');
    }
}
