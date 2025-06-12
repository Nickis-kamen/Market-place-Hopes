<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Boost;
use Illuminate\Http\Request;

class BoostController extends Controller
{
    //
    public function index()
    {
        $boosts = Boost::latest()->paginate(10);
        // dd($boosts);
        return view('admin.boost.index', compact('boosts'));
    }

    public function approve(string $id)
    {
        $boost = Boost::findOrFail($id);
        $now = now();

        $boost->update([
            'is_approved' => true,
            'starts_at' => $now,
            'ends_at' => $now->addDays($boost->duration_days),
        ]);

        // Mettre à jour le produit boosté
        $boost->product->update([
            'is_boosted' => true,
            'boosted_until' => $boost->ends_at,
        ]);

        return redirect()->back()->with('success', 'Le boost a été approuvé et activé.');
    }


}
