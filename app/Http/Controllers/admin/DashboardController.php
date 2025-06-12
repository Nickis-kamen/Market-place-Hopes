<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Boost;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $orderSum = Order::where('status', 'paid')->sum('total_amount');
        $boostSum = Boost::sum('amount');
        $commission = $orderSum * 0.1;
        $total = $orderSum + $boostSum;
        $adminRevenue = $boostSum + $commission;

        
        $sales = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM((total_amount)) as total')
            )
            ->where('status', 'paid')
            ->whereDate('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');
        
            $labelsSales = [];
            $dataSales = [];

            for ($i = 6; $i >= 0; $i--) {
                $day = now()->subDays($i)->format('Y-m-d');
                $labelsSales[] = Carbon::parse($day)->locale('fr_FR')->isoFormat('DD MMM');
                $dataSales[] = $sales[$day]->total ?? 0;
            }    
        $newUsers = User::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as total')
            )
            ->whereDate('created_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        $labelsUser = [];
        $dataUser = [];

        for ($i = 6; $i >= 0; $i--) {
            $day = now()->subDays($i)->format('Y-m-d');
            $labelsUser[] = Carbon::parse($day)->locale('fr_FR')->isoFormat('DD MMM');
            $dataUser[] = $newUsers[$day]->total ?? 0;
        }

        return view('admin.dashboard.index',[
            'user' => $user,'productCount' => Product::count(),
            'vendorCount' => User::where('role', 'vendor')->count(),
            'customerCount' => User::where('role', 'customer')->count(),
            'total' => $total,
            'adminRevenue' => $adminRevenue,
            'labelsSales' => $labelsSales,
            'labelsUser' => $labelsUser,
            'dataSales' => $dataSales,
            'dataUser' => $dataUser,
        ]);
    }
}
