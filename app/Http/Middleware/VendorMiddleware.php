<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VendorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->is_blocked) {
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => 'Votre compte a été bloqué.'
            ]);
        }
        // Vérifie le rôle
        if ($user->role !== 'vendor') {
            // Auth::logout();
            return redirect('/')->withErrors([
                'error' => 'Accès refusé. Rôle non autorisé.'
            ]);
        }

        // Vérifie si l'email est vérifié
        if (!$user->is_verified) {
            Auth::logout();
            return redirect('/login')->withErrors([
                'email' => 'Vous devez vérifier votre email avant d\'accéder à cette page.'
            ]);
        }

        // Vérifie si l'utilisateur est bloqué

        return $next($request);
    }
}
