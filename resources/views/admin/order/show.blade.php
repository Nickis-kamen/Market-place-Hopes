<x-admin.layout-admin title="Détails de la commande #{{ $order->id }}">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Commande #{{ $order->id }}</h1>

        <div class="bg-white shadow rounded-2xl p-6 mb-10">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Informations générales</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600 text-sm">
                <p><span class="font-medium">Client :</span> {{ $order->user->name ?? '—' }}</p>
                <p><span class="font-medium">Email :</span> {{ $order->user->email ?? '—' }}</p>
                <p><span class="font-medium">Date :</span> {{ $order->created_at->format('d M Y à H:i') }}</p>
                <p><span class="font-medium">Statut :</span>
                    @php
                        $colors = [
                            'paid' => 'bg-green-100 text-green-800',
                            'en attente' => 'bg-yellow-100 text-yellow-800',
                            'unpaid' => 'bg-red-100 text-red-800',
                        ];
                        $status =[
                            'en attente' => 'en attente',
                            'paid' => 'payé',
                            'unpaid' => 'non payé',
                        ];
                    @endphp
                    <span class="px-2 py-1 rounded text-xs font-semibold {{ $colors[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                        {{ $status[$order->status] }}
                    </span>
                </p>
                <p><span class="font-medium">Lien du paiement :</span>
                    @if($order->stripe_session_id)
                                <a href="https://dashboard.stripe.com/test/payments/{{ $order->stripe_session_id }}"
                                    target="_blank"
                                    class="text-sm text-blue-600 hover:underline font-medium">
                                    {{ Str::limit($order->stripe_session_id, 20) }}
                                </a>
                    @endif</p>
                <p><span class="font-medium">Total :</span> <span class="font-semibold text-green-700">{{ number_format($order->total_amount, 0, ',', ' ') }} Ar</span></p>
            </div>
        </div>

        <div class="bg-white shadow rounded-2xl p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Produits commandés</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Produit</th>
                            <th class="px-6 py-3">Quantité</th>
                            <th class="px-6 py-3">Prix unitaire</th>
                            <th class="px-6 py-3">Sous-total</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100 text-sm">
                        @foreach($order->items as $item)
                            <tr class="hover:bg-gray-50 text-center">
                                <td class="px-6 py-4">{{ $item->id }}</td>
                                <td class="px-6 py-4">{{ $item->product->title ?? 'Produit supprimé' }}</td>
                                <td class="px-6 py-4">{{ $item->quantity }}</td>
                                <td class="px-6 py-4">{{ number_format($item->price, 0, ',', ' ') }} Ar</td>
                                <td class="px-6 py-4 text-green-600 font-medium">
                                    {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-end">
                <a href="{{ route('order.pdf', $order) }}"
                class="inline-block mt-5 text-xl px-3 py-1 font-semibold text-white bg-red-600 rounded hover:bg-red-200 hover:text-red-600"
                target="_blank">
                Imprimer en PDF
                </a>
            </div>
    </main>
</x-admin.layout-admin>
