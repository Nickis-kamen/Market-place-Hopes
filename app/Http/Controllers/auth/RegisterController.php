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
            'name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'first_name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'date' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d'),'after:1900-01-01'],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[^@\s]+@[^@\s]+\.com$/i'
            ],

            'phone' => ['required', 'regex:/^(032|033|034|037|038)\d{7}$/'],
            'address' => [ 'required','string', 'max:255'],
            'image' => [ 'nullable','image', 'max:2048'],
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/',      // majuscule
                'regex:/[\W]/',       // caractère spécial
            ],
        ],[
            'phone' => 'Le numero est invalide',
            'email.regex' => 'Votre email est invalide',
            'email.unique' => 'Votre email est déjà enregistré',
            'date.after' => 'Votre date de naissance est invalide',
            'date.before' => 'Vous devriez avoir plus de 18 ans',
            'name.regex' => 'Votre nom est invalide',
            'first_name.regex' => 'Votre prénom est invalide',
            'phone.required' => 'Le numero est vide',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule et un caractère spécial.',
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

        // $request->validate([
        //     'name' => 'required|string',
        //     'first_name' => 'required|string',
        //     'email' => 'required|email|unique:users',
        //     'date' => 'required',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'password' => 'required|confirmed|min:6',
        // ]);
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'first_name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'date' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d'),'after:1900-01-01'],
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[^@\s]+@[^@\s]+\.com$/i'
            ],

            'phone' => ['required', 'regex:/^(032|033|034|037|038)\d{7}$/'],
            'address' => [ 'required','string', 'max:255'],
            'image' => [ 'nullable','image', 'max:2048'],
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/',      // majuscule
                'regex:/[\W]/',       // caractère spécial
            ],
        ],[
            'phone' => 'Le numero est invalide',
            'email.regex' => 'Votre email est invalide',
            'email.unique' => 'Votre email est déjà enregistré',
            'date.after' => 'Votre date de naissance est invalide',
            'date.before' => 'Vous devriez avoir plus de 18 ans',
            'name.regex' => 'Votre nom est invalide',
            'first_name.regex' => 'Votre prénom est invalide',
            'phone.required' => 'Le numero est vide',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule et un caractère spécial.',
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
