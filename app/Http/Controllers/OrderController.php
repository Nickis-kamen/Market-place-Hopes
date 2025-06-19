<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function generatePdf(Order $order)
    {
        $pdf = Pdf::loadView('admin.order.pdf', compact('order'));
        return $pdf->download('commande-'.$order->id.'.pdf');
    }

}
