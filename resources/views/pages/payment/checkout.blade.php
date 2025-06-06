<x-layout title="Paiement">
    <x-sidebar-other :user="$user" />

    <section class="p-4 sm:ml-64 bg-gradient-to-b from-indigo-100 to-[#D6D2FF] mt-18 min-h-screen">
        <div class="mx-auto bg-white p-6 md:p-10 rounded-2xl shadow-lg max-w-6xl">
            <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Paiement par vendeur</h2>

            @foreach ($groupedItems as $vendorId => $data)
                <div class="mb-12 border border-indigo-200 p-6 rounded-xl bg-white shadow-md transition hover:shadow-xl">
                    <h3 class="text-2xl font-semibold text-indigo-800 mb-4">
                        🛒 Vendeur : {{ $data['vendor']->name }}
                    </h3>

                    <table class="w-full text-sm text-left text-gray-700 mb-6">
                        <thead class="bg-indigo-100 text-indigo-800 text-sm uppercase rounded">
                            <tr>
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Produit</th>
                                <th class="px-4 py-3 text-center">Prix</th>
                                <th class="px-4 py-3 text-center">Quantité</th>
                                <th class="px-4 py-3 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($data['items'] as $item)
                                <tr class="hover:bg-indigo-50">
                                    <td class="px-4 py-2 font-medium text-gray-900">
                                        <img src="/storage/{{ $item['image'] }}" alt="" class="w-15 h-15">
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900">{{ $item['title'] }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($item['price'], 0, ',', ' ') }} Ar</td>
                                    <td class="px-4 py-2 text-center">{{ $item['quantity'] }}</td>
                                    <td class="px-4 py-2 text-right font-semibold">
                                        {{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} Ar
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                        <p class="text-xl font-bold text-gray-800">
                            💰 Total : <span class="text-indigo-600">{{ number_format($data['total'], 0, ',', ' ') }} Ar</span>
                        </p>

                        <div x-data="{
                            async pay() {
                                const stripe = Stripe(@js($stripeKey));
                                const response = await fetch('{{ route('checkout.session') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        items: {{ json_encode($data['items']) }},
                                        vendor_id: {{ $vendorId }}
                                    })
                                });

                                const data = await response.json();

                                if (data.id) {
                                    stripe.redirectToCheckout({ sessionId: data.id });
                                } else {
                                    alert('Erreur : ' + data.error);
                                }
                            }
                        }">
                            <button @click="pay"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-lg shadow">
                                💳 Payer ce vendeur
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
<script>

    // console.log('aaaaaaaaaaaaa');
    console.log(Stripe(@js($stripeKey)));

</script>
