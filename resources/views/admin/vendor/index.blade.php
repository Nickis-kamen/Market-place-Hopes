<x-admin.layout-admin title="Utilisateurs">
    {{-- <x-sidebar-vendor /> --}}
      {{-- Contenu principal --}}
      <main class="py-10 px-8 sm:ml-64 h-screen mt-15">
          <h1 class="text-2xl font-bold mb-6">Liste des utilisateurs</h1>
          @if($vendors)
          <table class="w-full bg-white rounded shadow-md">
            <thead>
              <tr class="bg-gray-200 text-left text-sm">
                <th class="p-3">#</th>
                <th class="p-3">Nom</th>
                <th class="p-3">E-mail</th>
                <th class="p-3">Adresse</th>
                <th class="p-3">Téléphone</th>
                <th class="p-3">Date Inscription</th>
                <th class="p-3">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($vendors as $vendor )
                <tr class="border-t text-sm">
                    <td class="p-3">{{ $vendor->id }}</td>
                    <td class="p-3">{{ $vendor->name }}</td>
                    <td class="p-3">{{ $vendor->email }}</td>
                    <td class="p-3">{{ $vendor->address }}</td>
                    <td class="p-3">{{ $vendor->phone }}</td>
                    <td class="p-3">{{ $vendor->created_at->format('Y-m-d')  }}</td>
                    <td class="p-3">
                    <a href="#" class="text-red-500 hover:underline">Bloquer</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        @else
            <p class="text-gray-700 mb-4">Aucun vendeur.</p>
        @endif

      </main>
  </x-admin.layout-admin>
