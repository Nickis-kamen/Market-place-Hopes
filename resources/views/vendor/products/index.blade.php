<x-vendor.layout-vendor title="Mes Produits">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 sm:ml-64 h-screen mt-15">
          <h1 class="text-2xl font-bold mb-6">Mes Produits</h1>
          {{-- @if($shop) --}}
          <table class="w-full bg-white rounded shadow-md">
            <thead>
              <tr class="bg-gray-200 text-left text-sm">
                <th class="p-3">Nom</th>
                <th class="p-3">Prix</th>
                <th class="p-3">Stock</th>
                <th class="p-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Exemple de ligne de produit --}}
              <tr class="border-t text-sm">
                <td class="p-3">Produit 1</td>
                <td class="p-3">19.99 €</td>
                <td class="p-3">25</td>
                <td class="p-3">
                  <a href="#" class="text-blue-500 hover:underline mr-2">Modifier</a>
                  <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                </td>
              </tr>
              {{-- Fin de l'exemple --}}
            </tbody>
          </table>
        {{-- @else --}}
            <p class="text-gray-700 mb-4">Vous n’avez pas encore de boutique.</p>
            <a href="" class="bg-blue-600 text-white px-4 py-2 rounded">Créer ma boutique</a>
        {{-- @endif --}}

      </main>
  </x-vendor.layout-vendor>
