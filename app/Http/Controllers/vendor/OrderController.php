<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function index()
    {
        $vendorId = Auth::user();

        Order::where('vendor_id', $vendorId->id)
        ->where('is_viewed_by_vendor', false)
        ->update(['is_viewed_by_vendor' => true]);
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

         // Si on passe à "paid" et qu'avant ce n'était pas encore "paid"
        if ($validated['status'] === 'paid' && $order->status !== 'paid') {

            // On parcourt tous les produits de la commande
            foreach ($order->items as $item) {
                $product = $item->product;

                // On vérifie s’il reste assez de stock (optionnel)
                if ($product->quantity >= $item->quantity) {
                    $product->quantity -= $item->quantity;
                    $product->save();
                }
                // Sinon on pourrait lever une erreur ou loguer
            }
        }

        if ($order->status === 'paid' && $validated['status'] !== 'paid') {
            return redirect()->back()->with('error', 'Impossible de modifier une commande déjà payée.');
        }

        $order->status = $validated['status'];
        $order->save();

        return redirect()->route('vendor.orders.index')->with('success', 'Statut de la commande mis à jour.');
    }

}

