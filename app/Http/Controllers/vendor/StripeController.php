<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Account;
use Stripe\Stripe;
use App\Models\User;
use Stripe\AccountLink;
use Stripe\StripeClient;

class StripeController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('vendor.stripe.index',[
            'user'=> $user
        ]);
    }

    public function createStripeAccount()
    {

        Stripe::setApiKey(config('services.stripe.secret'));
        $user = Auth::user();
        $account = Account::create([
            'type' => 'express',
            'country' => 'US',
            'email' => $user->email,
            'business_type' => 'individual',
            'capabilities' => [
                'card_payments' => ['requested' => true],
                'transfers' => ['requested' => true],
            ],
            'individual' => [
                'first_name' => $user->first_name,
                'last_name' => $user->name,
                'email' => $user->email,
                'dob' => [
                    'day' => intval(date('d', strtotime($user->date_naissance))),
                    'month' => intval(date('m', strtotime($user->date_naissance))),
                    'year' => intval(date('Y', strtotime($user->date_naissance))),
                ],
            ],
        ]);

        /** @var \App\Models\User $user */
        $user->update(['stripe_account_id' => $account->id]);

        $accountLink = AccountLink::create([
            'account' => $account->id,
            'refresh_url' => route('vendor.stripe.account.refresh'),
            'return_url' => route('vendor.stripe'),
            'type' => 'account_onboarding',
        ]);

        return redirect($accountLink->url);
    }

    public function deleteStripeAccount()
    {
        $user = Auth::user();

        if (!$user->stripe_account_id) {
            return back()->with('error', 'Aucun compte Stripe associé à ce vendeur.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));
        // dd(config('services.stripe.secret'));
        try {
            $stripe = new StripeClient(config('services.stripe.secret'));

            $stripe->accounts->delete($user->stripe_account_id);

            /** @var \App\Models\User $user */
            $user->update(['stripe_account_id' => null]);

            return back()->with('success', 'Compte Stripe supprimé avec succès.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de la suppression : ' . $e->getMessage());
        }
    }

    public function accessStripeExpress()
    {
        $user = Auth::user();

        if (!$user->stripe_account_id) {
            return back()->with('error', 'Aucun compte Stripe Express lié.');
        }

        $stripe = new StripeClient(config('services.stripe.secret'));

        $loginLink = $stripe->accounts->createLoginLink($user->stripe_account_id);

        return redirect($loginLink->url);
    }

}
