<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $orders = Order::query();

        if ($request->filled('year')) {
            $orders->whereYear('created_at', $request->year);
        }

        if ($request->filled('month')) {
            $orders->whereMonth('created_at', $request->month);
        }

        $orders = $orders->latest()->paginate(10)->withQueryString();


        return view('admin.order.index', compact('orders'));
    }
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', [
            'order' => $order,
        ]);
    }

}
