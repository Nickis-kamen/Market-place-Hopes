<x-admin.layout-admin title="Boutiques">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 sm:ml-64 h-screen mt-15">
          <h1 class="text-2xl font-bold mb-6">Liste des boutiques</h1>
          {{-- @if($shop) --}}
          <table class="w-full bg-white rounded shadow-md">
            <thead>
              <tr class="bg-gray-200 text-left text-sm">
                <th class="p-3">#</th>
                <th class="p-3">Nom</th>
                <th class="p-3">Description</th>
                <th class="p-3">Propriétaire</th>
                <th class="p-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              {{-- Exemple de ligne de produit --}}
              <tr class="border-t text-sm">
                <td class="p-3">1</td>
                <td class="p-3">Nom</td>
                <td class="p-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nulla eveniet earum nemo nobis debitis repellat corporis voluptatum quos pem</td>
                <td class="p-3">Koto</td>
                <td class="p-3">
                  <a href="#" class="text-blue-500 hover:underline mr-2">Modifier</a>
                  <a href="#" class="text-red-500 hover:underline">Supprimer</a>
                </td>
              </tr>
              {{-- Fin de l'exemple --}}
            </tbody>
          </table>
        {{-- @else --}}
            <p class="text-gray-700 mb-4">Aucune boutique.</p>
        {{-- @endif --}}

      </main>
  </x-admin.layout-admin>
