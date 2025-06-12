<x-admin.layout-admin title="Produits Boostés">
    <main class="py-10 px-8 sm:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Produits Boostés</h1>
        <x-success />
        @if ($boosts->count())
            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Produit</th>
                            <th class="px-6 py-4">Boutique</th>
                            <th class="px-6 py-4">Début</th>
                            <th class="px-6 py-4">Fin</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Montant</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($boosts as $boost)
                            <tr class="hover:bg-gray-50 transition text-center">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $boost->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $boost->product->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $boost->product->shop->name ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @if ($boost->starts_at)
                                        {{ $boost->starts_at->IsoFormat('DD MMM YYYY') }} à {{ $boost->starts_at->format('H:i')}}
                                    @else
                                        ----
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    @if ($boost->ends_at)
                                        {{ $boost->ends_at->IsoFormat('DD MMM YYYY') }} à {{ $boost->ends_at->format('H:i')}}
                                    @else
                                        ----
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    @if($boost->ends_at)
                                        @php
                                            $isActive = now() < $boost->ends_at
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $isActive ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                            {{ $isActive ? 'Actif' : 'Expiré' }}
                                        </span>
                                    @else
                                        ----
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ number_format($boost->amount, 0, ',', ' ') }} Ar</td>
                                <td class="flex flex-col mt-2 px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('admin.product.show', $boost->product) }}"
                                       class="w-full px-2 py-1 font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                        Voir Produit
                                    </a>
                                    @if(!$boost->is_approved)
                                        <form action="{{ route('admin.boost.approve', $boost->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            <button type="submit" class="w-full px-4 cursor-pointer py-1 text text-white bg-green-600 hover:bg-green-700 rounded">
                                                Approuver
                                            </button>
                                        </form>
                                    @else
                                        <span class=" mt-2 px-4 py-1 bg-green-100 text-green-800 font-medium rounded">
                                            Approuvé
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-6">
                {{ $boosts->links() }}
            </div>
        @else
            <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">
                Aucun produit boosté trouvé.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
