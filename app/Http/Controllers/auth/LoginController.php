<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function showLogin(){
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Aucun compte ne correspond à cet e-mail.',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Mot de passe incorrect.',
            ])->onlyInput('email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'customer') {
            return redirect()->intended('/');
        } elseif ($user->role === 'vendor') {
            return redirect()->intended('/vendor/dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->intended('/admin/dashboard');
        }

    }


    public function logout(Request $request): RedirectResponse
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
