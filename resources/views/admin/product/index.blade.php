<x-admin.layout-admin title="Produits">
    <main class="py-10 px-8 sm:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Liste des produits</h1>

        <!-- Filtres -->
        <form method="GET" class="mb-6 flex flex-wrap justify-between bg-white p-4 rounded-xl shadow">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                <select name="category" class="w-60 border-gray-300 rounded-md">
                    <option value="">Toutes</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Boutique</label>
                <select name="shop" class="w-60 border-gray-300 rounded-md">
                    <option value="">Toutes</option>
                    @foreach ($shops as $shop)
                        <option value="{{ $shop->id }}" {{ request('shop') == $shop->id ? 'selected' : '' }}>
                            {{ $shop->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Recherche</label>
                <input type="search" name="search" placeholder="Nom du produit" value="{{ request('search') }}" class="border-gray-300 rounded-md w-60">
            </div>

            <div class="self-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm shadow hover:bg-blue-700">
                    Filtrer
                </button>
            </div>
        </form>

        @if($products->count())
            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Image</th>
                            <th class="px-6 py-4">Nom</th>
                            <th class="px-6 py-4">Déscription</th>
                            <th class="px-6 py-4">Stock</th>
                            <th class="px-6 py-4">Prix</th>
                            <th class="px-6 py-4">Crée le</th>
                            <th class="px-6 py-4">Boutique</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $product->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <img src="/storage/{{ $product->image }}" class="w-15" alt="">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($product->description, 20) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->quantity ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ number_format($product->price, 0, ',', ' ') }} Ar</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->created_at->format('d-m-y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500"><a href="{{ route('admin.shop.show', $product->shop) }}" class="hover:underline hover:text-blue-500">{{ $product->shop->name ?? '—' }}</a></td>
                                <td class="px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('admin.product.show', $product) }}" class="inline-block px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                        Voir
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             <nav class="mt-8 flex justify-center">
            <ul class="inline-flex items-center space-x-1 text-sm">
                {{-- Page précédente --}}
                @if ($products->onFirstPage())
                    <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </li>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="">
                        <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                    </a>
                @endif

                {{-- Liens de page --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <li>
                        @if ($page == $products->currentPage())
                            <span class="px-3 py-2 bg-blue-600 text-white font-bold rounded-md">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-blue-100">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach

                {{-- Page suivante --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="">
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
                Aucun produit trouvé.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
