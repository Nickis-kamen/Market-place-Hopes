<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        return view('pages.contact.index',compact('user'));
    }

    public function submitForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);


        Mail::to('admin@gmail.com')->send(new ContactMail($validated));

        return back()->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons sous peu.');
    }
}

