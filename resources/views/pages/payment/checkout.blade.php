<x-layout title="Panier">
    <x-sidebar-other :user="$user" />

    <section class="p-4 sm:ml-64 bg-gradient-to-b from-indigo-100 to-[#D6D2FF] mt-18 min-h-screen">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-bold mb-4">Paiement</h2>
            <p class="text-lg mb-6">Montant total : <strong>{{ number_format($total, 2) }} Ar</strong></p>
            <div x-data="{
                async pay() {
                    const stripe = Stripe(@js($stripeKey));
                    const response = await fetch('{{ route('createCheckoutSession') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            total: {{ json_encode($total) }}
                        })
                    });

                    const data = await response.json();
                    stripe.redirectToCheckout({ sessionId: data.id });
                }
            }">
                <button @click="pay"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Payer maintenant
                </button>
            </div>

        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
{{-- <script>
    console.log("Clé Stripe :", @json($stripeKey));
</script> --}}

</x-layout>
