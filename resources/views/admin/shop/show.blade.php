<x-admin.layout-admin title="Détails de la boutique">
    <div class="py-10 px-6 sm:ml-64 bg-gray-50 min-h-screen mt-18">
        <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-lg p-8">
            
            <div class="flex flex-col md:flex-row md:items-start md:space-x-8">
                <!-- Image Boutique -->
                <div class="flex-shrink-0 mb-6 md:mb-0">
                    <img src="/storage/{{ $shop->image }}"
                         alt="Photo de {{ $shop->name }}"
                         class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow" />
                </div>

                <!-- Infos Boutique -->
                <div class="text-center md:text-left flex-1">
                    <h2 class="text-3xl font-extrabold text-gray-800 break-words">{{ $shop->name }}</h2>
                    <p class="text-sm text-gray-400 mt-1">Propriétaire : 
                        <span class="uppercase font-semibold text-indigo-600"><a href="{{ route('admin.user.show', $shop->user->id) }}">{{ $shop->user->name }}</a></span>
                    </p>
                    <p class="text-sm text-gray-400">Crée le : {{ $shop->created_at->translatedFormat('d F Y') }}</p>

                    <div class="mt-3">
                        <p class="text-sm text-gray-600 font-medium mb-1">Description :</p>
                        <p class="text-sm text-gray-800 whitespace-pre-line break-words">{{ $shop->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Informations supplémentaires -->
            <div class="mt-8 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Informations supplémentaires</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <span class="font-medium">Adresse :</span>
                        <p>{{ $shop->adresse ?? 'Non renseignée' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin.layout-admin>
