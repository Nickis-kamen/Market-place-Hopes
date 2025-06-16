<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showCustomer()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', [
            'customers' => $customers
        ]);
    }
    public function showVendor()
    {
        $vendors = User::where('role', 'vendor')->get();
        return view('admin.vendor.index', [
            'vendors' => $vendors
        ]);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = true;
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur bloqué avec succès.');
    }

    public function unblock($id)
    {
        $user = User::findOrFail($id);
        $user->is_blocked = false;
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur débloqué avec succès.');
    }

}
