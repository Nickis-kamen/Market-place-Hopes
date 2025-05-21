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
}
