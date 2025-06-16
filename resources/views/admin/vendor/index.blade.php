<x-admin.layout-admin title="Utilisateurs">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Liste des vendeurs</h1>

        @if($vendors && $vendors->count())
            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Nom</th>
                            <th class="px-6 py-4">E-mail</th>
                            <th class="px-6 py-4">Adresse</th>
                            <th class="px-6 py-4">Téléphone</th>
                            <th class="px-6 py-4">Inscrit le</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($vendors as $vendor)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $vendor->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $vendor->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $vendor->email }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $vendor->address ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $vendor->phone ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $vendor->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 text-sm text-center space-x-2">
                                    <a href="{{ route('admin.user.show', $vendor->id) }}"
                                       class="inline-block px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                        Voir
                                    </a>
                                    <a href="#"
                                       class="inline-block px-3 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded hover:bg-red-200">
                                        Bloquer
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">
                Aucun vendeur trouvé.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
