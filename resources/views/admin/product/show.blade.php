<x-admin.layout-admin title="Détail du produit">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-3xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                {{-- Image principale --}}
                <div class="bg-gray-100 p-6 flex items-center justify-center">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                         class="rounded-xl max-h-96 w-full bg-cover bg-no-repeat object-contain shadow-md" style="background-image: url('{{ asset('images/wave.svg') }}');">
                </div>

                {{-- Informations produit --}}
                <div class="p-8 space-y-5">
                    <h1 class="text-3xl font-extrabold text-gray-800">{{ $product->title }}</h1>

                    <p class="text-gray-600 text-sm leading-relaxed">{{ $product->description }}</p>

                    <div class="grid grid-cols-2 gap-4 mt-4">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Prix</p>
                            <p class="text-lg font-semibold text-green-600">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Stock</p>
                            <p class="text-lg font-semibold text-gray-700">{{ $product->quantity }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Boutique</p>
                            <p class="text-base font-medium text-gray-800">{{ $product->shop->name ?? '—' }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Ajouté le</p>
                            <p class="text-base text-gray-600">{{ $product->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    {{-- Catégories --}}
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Catégories</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($product->categories as $category)
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full shadow-sm">
                                    {{ $category->title }}
                                </span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Boutons --}}
                    <div class="mt-6 flex space-x-3">
                        <a href="{{ route('admin.products.index') }}"
                           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm rounded-lg">
                            ← Retour à la liste
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-admin.layout-admin>
