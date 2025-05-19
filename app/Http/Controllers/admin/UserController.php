<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function showCustomer()
    {
        return view('admin.customers.index');
    }
    public function showVendor()
    {
        return view('admin.vendor.index');
    }
}
