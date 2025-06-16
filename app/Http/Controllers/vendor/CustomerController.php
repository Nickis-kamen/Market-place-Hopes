<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('vendor.customer.show', compact('user'));
    }
}
