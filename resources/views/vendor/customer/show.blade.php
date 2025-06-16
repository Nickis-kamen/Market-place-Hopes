<x-vendor.layout-vendor title="Détails de l'utilisateur">
    <div class="py-10 px-6 md:ml-64 bg-gray-50 min-h-screen mt-18">
        <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-lg p-8">
            <!-- Profil utilisateur -->
            <div class="flex flex-col md:flex-row items-center md:items-start md:space-x-8">
                <div class="mb-4 md:mb-0">
                    <img src="/storage/{{ $user->image }}"
                         alt="Photo de {{ $user->name }}"
                         class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow" />
                </div>

                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-extrabold text-gray-800">{{ $user->name }}</h2>
                    <h3 class="text-xl text-gray-600 font-semibold">{{ $user->first_name }}</h3>
                    <p class="text-gray-500 mt-1 flex gap-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                        {{ $user->email }}</p>
                    <p class="text-sm text-gray-400 mt-1">Rôle : <span class="uppercase font-semibold text-indigo-600">{{ $user->role =='customer'? 'Client':'Vendeur'  }}</span></p>
                    <p class="text-sm text-gray-400">Inscrit le : {{ $user->created_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            <!-- Informations supplémentaires -->
            <div class="mt-8 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Informations supplémentaires</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <span class="font-medium">Adresse :</span>
                        <p>{{ $user->address ?? 'Non renseignée' }}</p>
                    </div>
                    <div>
                        <span class="font-medium">Téléphone :</span>
                        <p>{{ $user->phone ?? 'Non renseigné' }}</p>
                    </div>
                    <div>
                        <span class="font-medium">Date de naissance :</span>
                        <p>{{ $user->date_naissance->IsoFormat('DD MMMM YYYY') }}</p>
                    </div>
                    <!-- Tu peux ajouter ici d'autres colonnes comme genre, date de naissance, etc. -->
                </div>
            </div>
        </div>
    </div>
</x-vendor.layout-vendor>
