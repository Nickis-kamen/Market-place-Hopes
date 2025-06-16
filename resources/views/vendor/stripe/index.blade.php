<x-vendor.layout-vendor title="Stripe">
    <div class="py-10 md:ml-64 min-h-screen mt-15 bg-gradient-to-b from-indigo-100 to-indigo-200">
        <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200">
            <x-success />
            {{-- Logo Stripe --}}
            <div class="flex justify-center">
                <img src="{{ asset('/images/stripe.png') }}"
                     alt="Stripe Logo" class="">
            </div>

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion à Stripe</h2>


            {{-- Compte déjà connecté --}}
            @if ($user->stripe_account_id)
                <div class="bg-blue-50 text-blue-600 px-4 py-3 rounded mb-6 border border-blue-300 text-sm">
                    <strong>Votre compte Stripe est connecté : </strong>
                    {{ $user->stripe_account_id }}
                </div>

                <p class="text-gray-700 mb-6">
                    Accédez à votre tableau de bord Stripe Express :
                </p>

                <div class="text-center  mb-6">
                    <a href="{{ route('vendor.stripe.login') }}" target="_blank"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition">
                        Accéder à Stripe Express
                    </a>
                </div>
            @else
                <p class="text-gray-700 mb-6 text-sm">
                    Pour recevoir des paiements, connectez votre compte Stripe en cliquant ci-dessous :
                </p>

                <form action="{{ route('vendor.stripe.connect') }}" method="GET">
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-3 rounded shadow-md transition font-semibold">
                        Connecter mon compte Stripe
                    </button>
                </form>
            @endif
        </div>
    </div>
</x-vendor.layout-vendor>
