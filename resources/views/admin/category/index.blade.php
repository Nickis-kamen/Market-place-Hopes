<x-admin.layout-admin title="Catégories">
    <main class="py-10 px-8 sm:ml-64 bg-gray-50 min-h-screen mt-18">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Liste des catégories</h1>
            <a href="{{ route('admin.categories.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow">
               + Ajouter une catégorie
            </a>
        </div>
        <x-success />
        <x-error />
        @if($categories)
            <div class="overflow-x-auto bg-white rounded-xl shadow">
                <table class="min-w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Titre</th>
                            <th class="px-6 py-3">Description</th>
                            <th class="px-6 py-3">Nombre de produits</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">{{ $category->id }}</td>
                                <td class="px-6 py-4 break-words max-w-xs">{{ $category->title }}</td>
                                <td class="px-6 py-4">{{ Str::limit($category->description, 60) }}</td>
                                <td class="px-6 py-4">{{ $category->products_count }}</td>
                                <td class="px-6 py-4">
                                    {{-- @dd($category) --}}
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                       class="text-blue-600 hover:underline mr-3">Modifier</a>
                                    <a href="#"
                                       class="text-red-500 hover:underline">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600 mt-6">Aucune catégorie trouvée.</p>
        @endif
    </main>
</x-admin.layout-admin>
