<x-admin.layout-admin title="Boutiques">
    <main class="py-10 px-8 sm:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Liste des clients</h1>

        @if($shops)
            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Image</th>
                            <th class="px-6 py-4">Nom</th>
                            <th class="px-6 py-4">Déscription</th>
                            <th class="px-6 py-4">Adresse</th>
                            <th class="px-6 py-4">Crée le</th>
                            <th class="px-6 py-4">Propriétaire</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($shops as $shop)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $shop->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900"><img src="/storage/{{ $shop->image }}" class="w-15" alt=""></td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $shop->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($shop->description, 60) }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $shop->adresse ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $shop->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $shop->user->name }}</td>
                                <td class="px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('admin.shop.show', $shop) }}" class="inline-block px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                        Voir
                                    </a> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">
                Aucune boutique trouvé.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
