<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    //
    public function showCustomerForm(){
        return view('pages.auth.register');
    }
    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $token = Str::random(64);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'date_naissance'=> $request->date,
            'address'  => $request->address,
            'verification_token' => $token,
            'is_verified' => false,
            'role'     => 'customer',
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user, $token));

        return redirect('/login')->with('success', 'Inscription réussie, vérifiez votre email pour activer votre compte.');
    }

    public function showVendorForm()
    {
        return view('pages.auth.registerVendor');
    }

    public function registerVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'date' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $token = Str::random(64);

        $user = User::create([
            'name'     => $request->name,
            'first_name'=> $request->first_name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'date_naissance'=> $request->date,
            'verification_token' => $token,
            'is_verified' => false,
            'role'     => 'vendor',
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new VerifyEmail($user, $token));

        return redirect('/login')->with('success', 'Inscription réussie, vérifiez votre email pour activer votre compte.');
    }

}
