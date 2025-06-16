<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    //
    public function admin()
    {
        $user = Auth::user();
        return view('admin.password.index', compact('user'));
    }
    public function vendor()
    {
        $user = Auth::user();
        return view('vendor.profile.password', compact('user'));
    }
    public function customer()
    {
        $user = Auth::user();
        return view('pages.profile.password', compact('user'));
    }

    public function infoVendor()
    {
        $user = Auth::user();
        return view('vendor.profile.info', compact('user'));
    }
    public function editVendor()
    {
        $user = Auth::user();
        return view('vendor.profile.edit', compact('user'));
    }
    public function infoCustomer()
    {
        $user = Auth::user();
        return view('pages.profile.info', compact('user'));
    }
    public function editCustomer()
    {
        $user = Auth::user();
        return view('pages.profile.edit', compact('user'));
    }

    public function updateInfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'first_name' => ['required', 'regex:/^[a-zA-Z\s\-]+$/u'],
            'date_naissance' => ['required', 'date', 'before:' . now()->subYears(18)->format('Y-m-d'),'after:1900-01-01'],
            'phone' => ['required', 'regex:/^(032|033|034|037|038)\d{7}$/'],
            'address' => [ 'required','string', 'max:255'],
            'image' => [ 'nullable','image', 'max:2048'],
        ],[
            'phone' => 'Le numero est invalide',
            'date_naissance.after' => 'Votre date de naissance est invalide',
            'date_naissance.before' => 'Vous devriez avoir plus de 18 ans',
            'name.regex' => 'Votre nom est invalide',
            'first_name.regex' => 'Votre prénom est invalide',
            'phone.required' => 'Le numero est vide',
        ]);

        $user = Auth::user();

        // Gérer l'image si uploadée
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profile_images', 'public');
            $user->image = $path;
        }

        /** @var \App\Models\User $user */
        $user->update($request->except('image'));
        if($user->role == 'vendor'){
            return redirect('vendor/profile/informations')->with('success', 'Informations mises à jour avec succès.');
        }else{
            return redirect('profile/informations')->with('success', 'Informations mises à jour avec succès.');
        }
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/[A-Z]/',      // majuscule
                'regex:/[\W]/',       // caractère spécial
            ],
        ], [
            'current_password.required' => 'Le mot de passe actuel est obligatoire.',
            'new_password.required' => 'Le nouveau mot de passe est obligatoire.',
            'new_password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'new_password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'new_password.regex' => 'Le mot de passe doit contenir au moins une majuscule et un caractère spécial.',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        /** @var \App\Models\User $user */
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
