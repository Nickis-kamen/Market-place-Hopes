<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    //
    // public function checkou()
    // {
    //     $user = Auth::user();
    //     $panier = session('cart', []);

    //     if (empty($panier)) {
    //         return redirect()->back()->with('error', 'Votre panier est vide.');
    //     }

    //     $total = collect($panier)->sum(function ($item) {
    //         return $item['price'] * $item['quantity'];
    //     });

    //     $items = collect($panier)->map(function ($item) {
    //         return [
    //             'image' => $item['image'],
    //             'name' => $item['title'],
    //             'price' => $item['price'],
    //             'quantity' => $item['quantity'],
    //         ];
    //     })->values()->toArray();

    //     return view('pages.payment.checkout', [
    //         'user' => $user,
    //         'stripeKey' => config('services.stripe.key'),
    //         'total' => $total,
    //         'items' => $items,
    //     ]);
    // }
    public function checkout()
    {
        $user = Auth::user();
        $cart = session('cart', []);
        // dd(config('services.stripe.key'));
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        // Grouper les produits par vendeur
        $grouped = collect($cart)->groupBy('vendor_id');

        $groupedItems = $grouped->map(function ($items, $vendorId) {
            $vendor = User::find($vendorId);

            return [
                'vendor' => $vendor,
                'items' => $items,
                'total' => collect($items)->sum(fn($item) => $item['price'] * $item['quantity']),
            ];
        });

        return view('pages.payment.checkout', [
            'user' => $user,
            'stripeKey' => config('services.stripe.key'),
            'groupedItems' => $groupedItems,
        ]);
    }

    public function createCheckoutSession(Request $request)
    {
        // dd(config('services.stripe.secret'));
        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $items = $request->input('items', []);
            $vendor_id = $request->input('vendor_id');

            if (empty($items) || !$vendor_id)
            {
                return response()->json(['error' => 'Paramètres manquants'], 400);
            }

            $vendor = User::find($vendor_id);
            if (!$vendor || !$vendor->stripe_account_id)
            {
                return response()->json(['error' => 'Vendeur introuvable ou non connecté à Stripe'], 400);
            }

            // $USDRate = 4700;
            $lineItems = [];

            foreach ($items as $item) {
                $price = $item['price'];
                // $priceCents = intval(round($priceUSD * 100));

                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'mga',
                        'product_data' => [
                            'name' => $item['title'],
                        ],
                        'unit_amount' => $price,
                    ],
                    'quantity' => $item['quantity'],
                ];
            }

            $commission = intval(round($price * 0.10));

            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'customer_email' => $request->user()->email,
                'success_url' => route('checkout.success', ['vendor' => $vendor_id]) . '&session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.cancel'),
                'payment_intent_data' => [
                    'application_fee_amount' => $commission,
                    'transfer_data' => [
                        'destination' => $vendor->stripe_account_id,
                    ],
                ],
            ]);

            return response()->json(['id' => $session->id]);

        } catch (Exception $e) {
            Log::error('Erreur Stripe : ' . $e->getMessage());
            return response()->json(['error' => 'Erreur lors de la création de la session'], 500);
        }
    }

    public function success(Request $request)
    {
        $vendorId = $request->vendor;
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect('/')->with('error', 'Session Stripe invalide.');
        }
        $stripe= new StripeClient(config('services.stripe.secret'));

        $session = $stripe->checkout->sessions->retrieve($sessionId, [
            'expand' => ['payment_intent'],
        ]);

        $paymentIntentId = $session->payment_intent->id ?? null;
        $cart = session('cart', []);

        // Filtrer les articles de ce vendeur
        $vendorItems = collect($cart)->filter(fn($item) => $item['vendor_id'] == $vendorId);

        if ($vendorItems->isEmpty()) {
            return redirect('/')->with('error', 'Aucun article pour ce vendeur.');
        }

        // Calcul du total
        $total = $vendorItems->sum(fn($item) => $item['price'] * $item['quantity']);

        // Création de la commande
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'vendor_id' => $vendorId,
            'total_amount' => $total,
            'status' => 'en attente',
            'stripe_session_id' => $paymentIntentId,
        ]);

        // Enregistrement des produits dans order_items
        foreach ($vendorItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Mise à jour du panier : on supprime les produits du vendeur concerné
        foreach ($cart as $productId => $item) {
            if ($item['vendor_id'] == $vendorId) {
                unset($cart[$productId]);
            }
        }
        session(['cart' => $cart]);

        return redirect()->route('orders.index')->with('success', 'Paiement effectué avec succès. Votre commande a été enregistrée.');
    }
    public function cancel()
    {
        return redirect()->route('cart.index')->with('error', 'Le paiement a été annulé.');
    }

}
