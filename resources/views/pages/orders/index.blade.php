<x-layout title="Mes Commandes">
    <x-sidebar-other :user="$user" />

    <section class="p-8 sm:ml-64 min-h-screen bg-gradient-to-b from-indigo-100 to-indigo-200">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-200 mt-18">
            <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">🧾 Mes Commandes</h2>

            <x-success />
            <x-error />

            @forelse ($orders as $order)
                <div class="mb-8 rounded-xl border border-gray-100 bg-gray-50 shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex justify-between items-center px-6 py-4 border-b bg-indigo-100 rounded-t-xl">
                        <div>
                            <p class="text-sm text-gray-700">
                                <strong>Commande #{{ $order->id }}</strong> –
                                {{ $order->created_at->format('d M Y \à H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Vendeur : <strong>{{ $order->vendor->name ?? 'Inconnu' }}</strong>
                            </p>
                        </div>
                        <span class="text-sm font-medium px-3 py-1 rounded-full
                            {{ $order->status === 'paid' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="p-6">
                        <table class="w-full text-sm mb-4">
                            <thead>
                                <tr class="text-gray-600 bg-indigo-50">
                                    <th class="px-3 py-2 text-left">Produit</th>
                                    <th class="px-3 py-2 text-left">Quantité</th>
                                    <th class="px-3 py-2 text-left">Prix</th>
                                    <th class="px-3 py-2 text-left">Total</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-800">
                                @foreach ($order->items as $item)
                                    <tr class="border-t">
                                        <td class="px-3 py-2">{{ $item->product->title ?? 'Produit supprimé' }}</td>
                                        <td class="px-3 py-2">{{ $item->quantity }}</td>
                                        <td class="px-3 py-2">{{ number_format($item->price, 0, ',', ' ') }} Ar</td>
                                        <td class="px-3 py-2 font-semibold">
                                            {{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-right text-base font-bold text-gray-700">
                            Total : {{ number_format($order->total_amount, 0, ',', ' ') }} Ar
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-600 text-lg py-10">
                    Vous n'avez encore passé aucune commande.
                </div>
            @endforelse
        </div>
    </section>
</x-layout>
