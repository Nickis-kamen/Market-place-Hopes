<x-layout title="Mes Commandes">
    <x-sidebar-other :user="$user" />

    <section class="p-8 md:ml-64 min-h-screen bg-gradient-to-b from-indigo-100 to-indigo-200 mt-18">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-200">
            <h2 class="text-3xl font-bold mb-8 text-indigo-800 text-center">🧾 Mes Commandes</h2>

            <x-success />
            <x-error />

            @forelse ($orders as $order)
                <div class="mb-8 rounded-xl border border-gray-100 bg-white hover:shadow-md transition duration-200">
                    <div class="flex justify-between items-center px-6 py-4 border-b bg-indigo-50 rounded-t-xl">
                        <div>
                            <p class="text-sm text-gray-700">
                                <strong>Commande #{{ $order->id }}</strong> – {{ $order->created_at->format('d M Y \à H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                Vendeur : <a href="{{ route('vendor.show', $order->vendor->id) }}"><span class="text-blue-500">{{ $order->vendor->name }}</span></a>
                            </p>
                        </div>

                        <span class="flex items-center gap-2  text-sm font-medium px-3 py-1 rounded-full
                            {{ $order->status === 'paid' ? 'bg-green-100 border border-green-700 text-green-700' : 'bg-yellow-100 border border-yellow-700  text-yellow-700' }}">
                            @if($order->status === 'paid')
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M19.916 4.626a.75.75 0 0 1 .208 1.04l-9 13.5a.75.75 0 0 1-1.154.114l-6-6a.75.75 0 0 1 1.06-1.06l5.353 5.353 8.493-12.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                </svg>

                                Payé
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                                </svg>
                                En attente
                            @endif
                        </span>
                    </div>

                    <div class="p-6 bg-gray-50 rounded-b-xl">
                        <table class="w-full text-sm mb-4">
                            <thead>
                                <tr class="text-gray-600 bg-indigo-100">
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
                        <a href="{{ route('order.pdf', $order) }}"
                        class="inline-block mt-5 px-3 py-1 font-semibold text-white bg-red-600 rounded hover:bg-red-200 hover:text-red-600"
                        target="_blank">
                        Imprimer en PDF
                        </a>
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
