<x-vendor.layout-vendor title="Mes Produits">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 sm:ml-64 h-screen mt-15">

          <h1 class="text-2xl font-bold mb-6">Mes Produits</h1>
          @if($shop)
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
                                <td class="p-4 text-center">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 font-medium mr-3">Modifier</a>
                                    <a href="#" class="text-red-500 hover:text-red-700 font-medium">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

          <div class="mt-4">
              <a href="{{ route('vendor.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Ajouter un produit</a>
          </div>
        @else
            <p class="text-gray-700 mb-4">Vous n’avez pas encore de boutique.</p>
            <a href="{{ route('vendor.shop.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Créer ma boutique</a>
        @endif
      </main>
  </x-vendor.layout-vendor>
