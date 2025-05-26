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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

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

        if (!$user->is_verified) {
            return back()->withErrors([
                'verification' => 'Vous devez vérifier votre adresse email avant de vous connecter.',
            ])->onlyInput('email');
        }

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->role === 'customer') {
            return redirect()->intended('/account');
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

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            // dd('tesst');
            return redirect('/login')->with('error', 'Token de vérification invalide.');

        }
            // dd('tesst');

        $user->is_verified = true;
        $user->verification_token = null;
        $user->email_verified_at = now();
        $user->save();
        return redirect('/login')->with('success', 'Email vérifié avec succès. Vous pouvez maintenant vous connecter.');
    }

}
