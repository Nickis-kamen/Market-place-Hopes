<x-vendor.layout-vendor title="Mes Produits">
    {{-- <x-sidebar-vendor /> --}}
    {{-- Contenu principal --}}
    <main class="py-10 px-8 sm:ml-64 h-screen mt-15">
        <x-success />
        @if($shop)
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Mes Produits</h1>
                <a href="{{ route('vendor.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Ajouter un produit</a>
            </div>

            <table class="w-full bg-white rounded-xl shadow-md overflow-hidden">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-100 to-blue-200 text-sm text-gray-700 uppercase tracking-wider">
                        <th class="p-4 text-left">Photo</th>
                        <th class="p-4 text-left">Nom</th>
                        <th class="p-4 text-left">Description</th>
                        <th class="p-4 text-left">Prix Ariary</th>
                        <th class="p-4 text-left">Stock</th>
                        <th class="p-4 text-left">Catégorie</th>
                        <th class="p-4 text-left">Date d'ajout</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($products->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-6 text-gray-500">Aucun produit trouvé.</td>
                        </tr>
                    @else
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition duration-200 text-sm">
                                <td class="p-4">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Produit" class="w-12 h-12 object-cover rounded-md border">
                                </td>
                                <td class="p-4 font-semibold text-gray-800">{{ $product->title }}</td>
                                <td class="p-4 text-gray-600">{{ Str::limit($product->description, 60) }}</td>
                                <td class="p-4 font-medium text-green-600">{{ number_format($product->price, 0, ',', ' ') }}</td>
                                <td class="p-4">{{ $product->quantity }}</td>
                                <td class="p-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($product->categories as $category)
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                {{ $category->title }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-4 text-gray-500">{{ $product->created_at->format('Y-m-d') }}</td>
                                <td class="p-4 text-center space-y-2">
                                    {{-- {{ route('vendor.products.boost', $product->id) }} --}}
                                    @if ($product->boosted_until > now())
                                        <div class="bg-green-50 rounded-md p-2 shadow-sm">
                                            <p class="block text-xs font-semibold text-green-700 mb-2">Boost expiré le :</p>
                                            <p>{{ $product->boosted_until }}</p>
                                        </div>
                                    @else
                                    <form action="{{ route('vendor.products.boost', $product) }}" method="POST" class="bg-indigo-50 rounded-md p-2 shadow-sm">
                                        @csrf
                                        <label for="duration" class="block text-xs font-semibold text-indigo-700 mb-1">Booster pour :</label>
                                        <select name="duration" id="duration" class="w-full text-sm rounded border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-center">
                                            <option value="1">1 jour - 5 000 Ar</option>
                                            <option value="3">3 jours - 13 000 Ar</option>
                                            <option value="7">7 jours - 30 000 Ar</option>
                                        </select>
                                        <button type="submit"
                                            class="mt-2 w-full bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 text-sm font-medium transition">
                                            ⚡ Booster
                                        </button>
                                    </form>
                                    @endif

                                    <div class="flex justify-between mt-5">
                                        <a href="{{ route('vendor.products.edit', $product) }}" class="inline-block text-indigo-600 hover:text-indigo-900 font-medium text-sm">✏️ Modifier</a>
                                        <form action="{{ route('vendor.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-block text-red-500 hover:text-red-700 font-medium text-sm">🗑️ Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        @else
            <p class="text-gray-700 mb-4">Vous n’avez pas encore de boutique.</p>
            <a href="{{ route('vendor.shop.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Créer ma boutique</a>
        @endif
    </main>
</x-vendor.layout-vendor>
