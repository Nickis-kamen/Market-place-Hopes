<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            if(Auth::user()->role === 'customer') {
                if(Auth::user()->is_verified) {
                    return $next($request);
                } else {
                    Auth::logout();
                    return redirect('/login')->withErrors([
                        'email' => 'Vous devez vérifier votre email avant d\'accéder à cette page.'
                    ]);
                }
            }
        }
        return redirect('/login');
    }
}
