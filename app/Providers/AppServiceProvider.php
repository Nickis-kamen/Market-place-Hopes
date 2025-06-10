<?php

namespace App\Providers;

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

    }
}
