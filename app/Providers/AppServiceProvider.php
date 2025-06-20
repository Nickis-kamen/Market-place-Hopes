<?php

namespace App\Providers;

use App\Models\Boost;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        setlocale(LC_TIME, 'fr_FR.UTF-8');
        App::setLocale('fr');
        Carbon::setLocale('fr');
        Paginator::useBootstrapFive();

        Blade::if('role', function ($role)
        {
            return Auth::check() && Auth::user()->role === $role;
        });

        View::composer('*', function ($view)
        {
            $view->with('cart', session('cart', []));
        });

        View::composer('components.vendor.sidebar-vendor', function ($view) {
             $count = 0;
            if (Auth::check()) {
                $count = Order::where('vendor_id', Auth::id())
                    ->where('is_viewed_by_vendor', false)
                    ->count();
            }
            $view->with('newOrdersCount', $count);
        });

        View::composer('components.admin.sidebar-admin', function ($view) {
            $countCustomer = 0;
            $countVendor = 0;
            $countBoostPending = 0;

            if (Auth::check() && Auth::user()->role === 'admin') {
                $countCustomer = User::where('role', 'customer')->where('is_viewed_by_admin', false)->count();
                $countVendor = User::where('role', 'vendor')->where('is_viewed_by_admin', false)->count();
                $countBoostPending = Boost::where('is_approved', false)->count(); 
            }

            $view->with([
                'countCustomer' => $countCustomer,
                'countVendor' => $countVendor,
                'countBoostPending' => $countBoostPending,
            ]);
        });

    }
}
