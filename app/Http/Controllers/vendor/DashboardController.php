<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        Carbon::setLocale('fr');

        $user = Auth::user();
        $shop = Shop::where('user_id', $user->id)->first();


        $products = Product::where('shop_id', $shop->id)->get();

        $boostedCount = Product::where('shop_id', $shop->id)
            ->where('boosted_until', '>', now())
            ->count();

        $monthlyOrdersCount = Order::where('vendor_id', $user->id)
            ->whereMonth('created_at', now()->month)
            ->count();

        $monthlyRevenue = Order::where('vendor_id', $user->id)
            ->whereMonth('created_at', now()->month)
            ->sum('total_amount');

        $recentProducts = Product::where('shop_id', $shop->id)
            ->latest()
            ->take(6)
            ->get();

        $sales = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total_amount) as total')
        )
        ->where('vendor_id', $user->id)
        ->whereDate('created_at', '>=', now()->subDays(6)->startOfDay())
        ->groupBy('date')
        ->orderBy('date')
        ->get()
        ->keyBy('date'); // pour un accès rapide par date

        // Crée les 7 derniers jours (même si aucune vente)
        $labels = [];
        $data = [];

        for ($i = 6; $i >= 0; $i--) {
            $day = now()->subDays($i)->format('Y-m-d');
            $labels[] = Carbon::parse($day)->format('d M');
            $data[] = $sales[$day]->total ?? 0;
        }

        return view('vendor.dashboard.index',[
            'user' => $user,
            'recentProducts' => $recentProducts,
            'products' => $products,
            'monthlyRevenue' => $monthlyRevenue,
            'monthlyOrdersCount' => $monthlyOrdersCount,
            'boostedCount' => $boostedCount,
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
