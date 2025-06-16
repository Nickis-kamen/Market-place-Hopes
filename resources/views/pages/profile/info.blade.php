<x-layout title="Profil utilisateur">
    <x-sidebar-other :user="$user"/>
    <main class="py-14 px-6 sm:px-8 md:ml-64 bg-gray-50 min-h-screen mt-18">
        <div class="relative max-w-3xl mx-auto bg-white p-10 rounded-3xl shadow-lg border border-gray-100">
            <x-success />
            <x-error />

            {{-- Bouton modifier --}}
            <a href="{{ route('edit') }}"
                class="absolute top-4 right-4 text-gray-500 hover:text-indigo-600 transition duration-150 ease-in-out"
                title="Modifier le profil">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:w-7 md:h-7" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
            </a>

            {{-- En-tête utilisateur --}}
            <div class="flex items-center gap-6 mb-8">
                <img src="{{ asset('storage/' . $user->image) }}"
                    alt="Photo de profil"
                    class="w-24 h-24 rounded-full border border-gray-300 object-cover shadow-md">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->first_name }} {{ $user->name }}</h1>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    <span class="inline-block mt-2 text-xs px-2 py-0.5 rounded-full font-medium
                        {{ $user->is_verified ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $user->is_verified ? '✅ Compte vérifié' : '❌ Non vérifié' }}
                    </span>
                </div>
            </div>

            <hr class="my-6 border-t border-gray-200">

            {{-- Informations personnelles --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
                <div>
                    <h4 class="text-gray-500 uppercase tracking-wide text-xs mb-1">Téléphone</h4>
                    <p class="text-gray-900">{{ $user->phone ?? 'Non renseigné' }}</p>
                </div>

                <div>
                    <h4 class="text-gray-500 uppercase tracking-wide text-xs mb-1">Adresse</h4>
                    <p class="text-gray-900">{{ $user->address ?? 'Non renseignée' }}</p>
                </div>

                <div>
                    <h4 class="text-gray-500 uppercase tracking-wide text-xs mb-1">Date de naissance</h4>
                    <p class="text-gray-900">
                        {{ $user->date_naissance->IsoFormat('DD MMMM YYYY') }}
                    </p>
                </div>

                <div>
                    <h4 class="text-gray-500 uppercase tracking-wide text-xs mb-1">Statut du compte</h4>
                    <p class="text-gray-900">
                        {{ $user->is_verified ? 'Compte actif' : 'En attente de vérification' }}
                    </p>
                </div>
            </div>
        </div>
    </main>
</x-layout>
