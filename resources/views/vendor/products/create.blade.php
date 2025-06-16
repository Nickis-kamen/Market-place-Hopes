<x-vendor.layout-vendor title="Creation">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 md:ml-64 h-screen mt-15  mb-25">
          <div class="bg-white shadow-md rounded-xl py-10 px-12 w-full max-w-2xl mx-auto">
              <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un nouveau produit</h2>
            @if($stripeId)
              <form action="{{ route('vendor.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-semibold">Image</label>
                    <x-error-input name="image" />
                    <input type="file" name="image" id="image" class="w-full border p-2 rounded" accept="image/*">
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold">Nom du produit</label>
                    <x-error-input name="title" />
                    <input type="text" name="title" id="name" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-semibold">Description</label>
                    <x-error-input name="description" />
                    <textarea name="description" id="description" rows="4" class="w-full border p-2 rounded"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Catégories</label>
                    <x-error-input name="categories" />
                    @if ($categories->isEmpty())
                        <p class="text-gray-500">Aucune catégorie disponible.</p>
                    @else
                    <div class="flex flex-wrap gap-4">
                        {{-- Boucle pour afficher les catégories --}}
                        @foreach ($categories as $category)
                            <div class="flex items-center">
                                <input type="checkbox" id="category-{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="peer hidden" />
                                <label for="category-{{ $category->id }}" class="cursor-pointer rounded-lg border px-3 py-1 text-gray-700 transition-colors duration-200 peer-checked:bg-blue-600 peer-checked:text-white">
                                    {{ $category->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    @endif
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700 font-semibold">Quantité</label>
                    <x-error-input name="quantity" />
                    <input type="number" name="quantity" id="quantity" step="1"
                        class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="">
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-semibold">Prix unitaire (en Ariary)</label>
                    <x-error-input name="price" />
                    <input type="number" name="price" id="price"
                        class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                        placeholder="">
                </div>


                <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                <div class="mt-10 text-center">
                    <button type="submit" class="cursor-pointer bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Créer le produit
                    </button>
                </div>
            </form>
            @else
            <div class="bg-white p-5 h-100 flex justify-center items-center">
                <div class="text-center">
                    <p class="text-gray-700 mb-8">Vous n’avez pas encore de compte stripe.😕</p>
                    <a href="{{ route('vendor.stripe') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Connecter à Stripe</a>
                </div>
            </div>
            @endif
        </div>
      </main>
</x-vendor.layout-vendor>
