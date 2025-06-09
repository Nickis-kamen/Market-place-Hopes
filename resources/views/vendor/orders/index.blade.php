<x-vendor.layout-vendor title="Commandes reçues">
    <div class="py-10 px-6 mt-18 sm:ml-64 min-h-screen bg-gradient-to-b from-indigo-100 to-indigo-200">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
            <h2 class="text-3xl font-bold mb-10 text-indigo-800 text-center">📦 Commandes reçues</h2>

            @if (session('success'))
                <div class="bg-green-100 border border-green-300 text-green-800 text-sm px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @forelse ($orders as $order)
                <div class="mb-8 p-6 rounded-2xl bg-gray-50 border border-gray-200 shadow-sm hover:shadow-md transition duration-200">
                    <div class="flex justify-between items-center mb-4 flex-wrap gap-2">
                        <div>
                            <p class="text-sm text-gray-700 font-semibold">
                                🧾 Commande #{{ $order->id }} – {{ $order->created_at->format('d M Y H:i') }}
                            </p>
                            <p class="text-sm text-gray-600">
                                👤 Client : <strong>{{ $order->user->name ?? 'Inconnu' }}</strong>
                            </p>
                        </div>

                        <div class="flex items-center gap-3 flex-wrap">
                            {{-- Statut amélioré --}}
                            @php
                                $statusMap = [
                                    'paid' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => '✅ Payé'],
                                    'unpaid' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => '❌ Non payé'],
                                    'en attente' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => '⏳ En attente'],
                                ];
                                $status = $statusMap[$order->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'label' => ucfirst($order->status)];
                            @endphp
                            <span class="inline-block px-3 py-1 rounded-lg text-sm font-medium border {{ $status['bg'] }} {{ $status['text'] }}">
                                {{ $status['label'] }}
                            </span>

                            {{-- Formulaire de changement de statut --}}
                            <form action="{{ route('vendor.orders.updateStatus', $order) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                    class="text-sm rounded-lg cursor-pointer px-6 py-2 border border-gray-300 bg-white text-gray-800 shadow-sm focus:outline-none focus:ring-1 focus:ring-indigo-500">
                                    <option value="unpaid" {{ $order->status === 'unpaid' ? 'selected' : '' }}>Non payé</option>
                                    <option value="paid" {{ $order->status === 'paid' ? 'selected' : '' }}>Payé</option>
                                </select>
                            </form>

                            {{-- Lien Stripe --}}
                            @if ($order->stripe_session_id)
                                <a href="https://dashboard.stripe.com/test/payments/{{ $order->stripe_session_id }}"
                                    target="_blank"
                                    class="text-sm text-blue-600 hover:underline font-medium">
                                    🔍 Stripe
                                </a>
                            @endif
                        </div>
                    </div>

                    <table class="w-full text-sm mb-4">
                        <thead>
                            <tr class="bg-indigo-100 text-indigo-900">
                                <th class="px-3 py-2 text-left">Produit</th>
                                <th class="px-3 py-2 text-left">Quantité</th>
                                <th class="px-3 py-2 text-left">Prix</th>
                                <th class="px-3 py-2 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr class="border-t text-gray-800">
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

                    <div class="text-right font-bold text-gray-700 text-base">
                        Total : {{ number_format($order->total_amount, 0, ',', ' ') }} Ar
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-600 text-lg py-12">
                    😕 Aucune commande reçue pour le moment.
                </div>
            @endforelse
        </div>
    </div>
</x-vendor.layout-vendor>
