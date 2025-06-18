<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorControler extends Controller
{
    //
    public function show(string $id)
    {
        $user = Auth::user();
        $vendor = User::findOrFail($id);
        return view('pages.vendor.show', compact('user','vendor'));
    }
}
