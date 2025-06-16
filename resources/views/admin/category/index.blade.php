<x-admin.layout-admin title="Catégories">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Liste des catégories</h1>
            <a href="{{ route('admin.categories.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm shadow">
               + Ajouter une catégorie
            </a>
        </div>

        <x-success />
        <x-error />

        @if($categories && $categories->count())
            <div class="bg-white shadow rounded-2xl overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr class="text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <th class="px-6 py-4">#</th>
                            <th class="px-6 py-4">Titre</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4">Nombre de produits</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach ($categories as $category)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $category->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $category->title }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($category->description, 60) }}</td>
                                <td class="px-6 py-4 text-sm text-center text-gray-500"><a href="{{ route('admin.categories.show', $category->id) }}" class="hover:underline hover:text-blue-500">{{ $category->products_count }}</a></td>
                                <td class="px-6 flex py-4 text-sm justify-center items-center space-x-1">
                                    @if ($category->slug !== 'autre')
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                           class="px-3 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                                            Modifier
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded hover:bg-red-200">
                                                Supprimer
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400 text-xs italic">Protégée</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-6 rounded-xl shadow text-center text-gray-600">
                Aucune catégorie trouvée.
            </div>
        @endif
    </main>
</x-admin.layout-admin>
