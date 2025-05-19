<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'role'     => 'customer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function showVendorForm(){
        return view('pages.auth.registerVendor');
    }

    public function registerVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'role'     => 'vendor',
            'password' => Hash::make($request->password),
        ]);

        // dd("test");

        // Shop::create([
        //     'name'     => $request->shop_name,
        //     'user_id'  => $user->id,
        //     'slug'     => Str::slug($request->shop_name),
        //     'description'  => 'Lorem beee',
        // ]);

        Auth::login($user);
        return redirect('/vendor/dashboard');
    }

}
