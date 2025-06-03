<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
        $user = Auth::user();
        $panier = session('cart', []);
        $total = collect($panier)->sum(fn($item) => $item['price'] * $item['quantity']);
    // dd(session('panier'));

        return view('pages.payment.checkout', [
            'user' => $user,
            'stripeKey' => config('services.stripe.key'),
            'total' => $total
        ]);
    }

    public function createCheckoutSession(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $total = $request->input('total') * 100;

            if ($total <= 0) {
                return response()->json(['error' => 'Montant invalide'], 400);
            }

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Commande panier',
                            'description' => 'Achat effectué sur MarketPlace',
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'billing_address_collection' => 'auto',
                'customer_email' => $request->user()->email,
                'success_url' => route('success'),
                'cancel_url' => route('cancel'),
            ]);

            return response()->json(['id' => $session->id]);

        } catch (Exception $e) {
            Log::error("Erreur Stripe : " . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la création de la session Stripe'], 500);
        }
    }

}
