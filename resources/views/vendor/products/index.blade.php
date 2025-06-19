<x-vendor.layout-vendor title="Mes Produits">
    <main class="py-10 px-4 sm:px-6 md:px-8 md:ml-64 mt-15 min-h-screen">
        <x-success />
        @if($shop)
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800">Mes Produits</h1>
                <a href="{{ route('vendor.products.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm sm:text-base text-center">
                    Ajouter un produit
                </a>
            </div>

            <!-- Wrapper pour scroll horizontal mobile -->
            <div class="w-full overflow-x-auto">
                <table class="min-w-full bg-white rounded-xl shadow-md text-sm sm:text-base">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-100 to-blue-200 text-gray-700 uppercase tracking-wider text-xs sm:text-sm">
                            <th class="p-3 text-left whitespace-nowrap">Photo</th>
                            <th class="p-3 text-left whitespace-nowrap">Nom</th>
                            <th class="p-3 text-left whitespace-nowrap">Description</th>
                            <th class="p-3 text-left whitespace-nowrap">Prix</th>
                            <th class="p-3 text-left whitespace-nowrap">Stock</th>
                            <th class="p-3 text-left whitespace-nowrap">Catégorie</th>
                            <th class="p-3 text-left whitespace-nowrap">Date</th>
                            <th class="p-3 text-center whitespace-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="p-3">
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                         alt="Produit"
                                         class="w-12 h-12 object-cover rounded-md border">
                                </td>
                                <td class="p-3 font-semibold text-gray-800">{{ $product->title }}</td>
                                <td class="p-3 text-gray-600">{{ Str::limit($product->description, 60) }}</td>
                                <td class="p-3 font-medium text-green-600">
                                    {{ number_format($product->price, 0, ',', ' ') }}
                                </td>
                                <td class="p-3">{{ $product->quantity }}</td>
                                <td class="p-3">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach ($product->categories as $category)
                                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-0.5 rounded-full">
                                                {{ $category->title }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-3 text-gray-500 whitespace-nowrap">
                                    {{ $product->created_at->format('Y-m-d') }}
                                </td>
                                <td class="p-3 text-center space-y-2 min-w-[200px]">
                                    {{-- Booster section --}}
                                    @if ($product->boosted_until > now())
                                        <div class="bg-green-50 rounded p-2 shadow-sm text-xs">
                                            <p class="font-semibold text-green-700 mb-1">Boost expiré le :</p>
                                            <p>{{ $product->boosted_until }}</p>
                                        </div>
                                    @else
                                        <form action="{{ route('vendor.products.boost', $product) }}" method="POST" class="bg-indigo-50 rounded p-2 shadow-sm">
                                            @csrf
                                            <label for="duration" class="block text-xs font-semibold text-indigo-700 mb-1">Booster pour :</label>
                                            <select name="duration" id="duration"
                                                    class="w-full text-xs rounded border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="1">1 jour - 5 000 Ar</option>
                                                <option value="3">3 jours - 15 000 Ar</option>
                                                <option value="7">7 jours - 35 000 Ar</option>
                                            </select>
                                            @if ($product->is_boosted)
                                                <button type="submit"
                                                    class="mt-2 w-full bg-indigo-600 text-white px-3 py-1 rounded text-xs font-medium hover:bg-indigo-700">
                                                    ⚡ Booster à nouveau
                                                </button>
                                            @else
                                                @if($product->boosts->where('is_approved', false)->isEmpty())
                                                    <button type="submit"
                                                        class="mt-2 w-full bg-indigo-600 text-white px-3 py-1 rounded text-xs font-medium hover:bg-indigo-700">
                                                        ⚡ Booster
                                                    </button>
                                                @else
                                                    <button disabled
                                                        class="mt-2 w-full bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium">
                                                        ⚡ En attente
                                                    </button>
                                                @endif
                                            @endif
                                        </form>
                                    @endif

                                    {{-- Edit/Delete --}}
                                    <div class="flex justify-between mt-3 gap-2">
                                        <a href="{{ route('vendor.products.edit', $product) }}"
                                           class="text-indigo-600 hover:text-indigo-900 font-medium text-xs">✏️ Modifier</a>
                                        <form action="{{ route('vendor.products.destroy', $product) }}" method="POST"
                                              onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-red-500 hover:text-red-700 font-medium text-xs">🗑️ Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-6 text-gray-500">Aucun produit trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 flex justify-center items-center text-center min-h-[300px] rounded shadow">
                <div>
                    <p class="text-gray-700 mb-6">Vous n’avez pas encore de produit. 😕</p>
                    <a href="{{ route('vendor.shop.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Créer ma boutique</a>
                </div>
            </div>
        @endif
    </main>
</x-vendor.layout-vendor>
