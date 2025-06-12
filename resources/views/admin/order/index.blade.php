<x-admin.layout-admin title="Commandes">
    <main class="py-10 px-8 sm:ml-64 min-h-screen bg-gray-50 mt-18">
        <div class="flex justify-between flex-wrap">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Liste des commandes</h1>
            <form method="GET" class="mb-6 flex flex-wrap justify-end items-end gap-4 bg-white p-4 rounded-xl shadow">
        
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Mois</label>
                    <select name="month" id="month"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">Tous</option>
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{ $m }}" {{ request('month') == $m ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
    
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700">Année</label>
                    <select name="year" id="year"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">Tous</option>
                        @for ($y = now()->year; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endfor
                    </select>
                </div>
    
                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                        Filtrer
                    </button>
                </div>
    
                <div>
                    <a href="{{ route('admin.orders.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>
        @if($orders->count())

            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Montant</th>
                            <th class="px-6 py-4">Lien du paiement</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($orders as $order)
                            <tr class="hover:bg-gray-50 transition text-center">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $order->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $order->user->name ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-green-600 font-semibold">
                                    {{ number_format($order->total_amount, 0, ',', ' ') }} Ar
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">@if ($order->stripe_session_id)
                                <a href="https://dashboard.stripe.com/test/payments/{{ $order->stripe_session_id }}"
                                    target="_blank"
                                    class="text-sm text-blue-600 hover:underline font-medium">
                                    {{ Str::limit($order->stripe_session_id, 20) }} 
                                </a>
                            @endif</td>
                                <td class="px-6 py-4 text-sm">
                                    @php
                                        $statusColors = [
                                            'en attente' => 'bg-yellow-100 text-yellow-800',
                                            'paid' => 'bg-green-100 text-green-800',
                                            'unpaid' => 'bg-red-100 text-red-800',
                                        ];
                                        $status =[
                                            'en attente' => 'en attente',
                                            'paid' => 'payé',
                                            'unpaid' => 'non payé',
                                        ];
                                    @endphp
                                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800' }}">
                                        {{ $status[$order->status] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $order->created_at->IsoFormat('DD MMM YYYY à H:MM') }}
                                </td>
                                <td class="px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('admin.order.show', $order) }}"
                                       class="inline-block px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                        Voir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <nav class="mt-8 flex justify-center">
            <ul class="inline-flex items-center space-x-1 text-sm">
                {{-- Page précédente --}}
                @if ($orders->onFirstPage())
                    <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </li>
                @else
                    <a href="{{ $orders->previousPageUrl() }}" class="">
                        <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                    </a>
                @endif

                {{-- Liens de page --}}
                @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                    <li>
                        @if ($page == $orders->currentPage())
                            <span class="px-3 py-2 bg-blue-600 text-white font-bold rounded-md">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-blue-100">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach

                {{-- Page suivante --}}
                @if ($orders->hasMorePages())
                    <a href="{{ $orders->nextPageUrl() }}" class="">
                        <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </li>
                    </a>
                @else
                    <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                @endif
            </ul>
        </nav>
        @else
            <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">
                Aucune commande trouvée.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
