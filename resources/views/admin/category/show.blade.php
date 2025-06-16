<x-admin.layout-admin title="Catégorie - {{ $category->title }}">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-10 flex items-center gap-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 00-2-2h-6l-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2h-6l-2 2H6a2 2 0 01-2-2v-6" />
    </svg>
    Catégorie : <span class="ml-2 text-indigo-700">{{ $category->title }}</span>
</h1>

<div class="bg-white shadow-md rounded-2xl p-6 mb-10">
    <h2 class="text-2xl font-semibold text-gray-700 mb-4 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-10 4h6" />
        </svg>
        Détails de la catégorie
    </h2>

    <div class="space-y-2 text-sm text-gray-600 leading-relaxed">
        <p><span class="font-medium text-gray-800">Description :</span> {{ $category->description }}</p>
        <p><span class="font-medium text-gray-800">Nombre de produits associés :</span>
            <span class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-2 py-1 rounded-full">
                {{ $category->products->count() }} produit{{ $category->products->count() > 1 ? 's' : '' }}
            </span>
        </p>
    </div>
</div>


        <div class="bg-white shadow rounded-2xl overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Image</th>
                        <th class="px-6 py-4">Nom</th>
                        <th class="px-6 py-4">Prix</th>
                        <th class="px-6 py-4">Boutique</th>
                        <th class="px-6 py-4">Ajouté le</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($category->products as $product)
                        <tr class="hover:bg-gray-50 transition text-center">
                            <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $product->id }}</td>
                            <td class="px-6 py-4">
                                <img src="/storage/{{ $product->image }}" class="w-14 h-14 rounded object-cover" alt="{{ $product->name }}">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $product->title }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ number_format($product->price, 0, ',', ' ') }} Ar</td>
                            <td class="px-6 py-4 text-sm text-gray-500"><a href="{{ route('admin.shop.show', $product->shop) }}" class="hover:underline hover:text-blue-500">{{ $product->shop->name ?? '—' }}</a></td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $product->created_at->isoFormat('DD MMM YYYY') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">Aucun produit associé à cette catégorie.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</x-admin.layout-admin>
