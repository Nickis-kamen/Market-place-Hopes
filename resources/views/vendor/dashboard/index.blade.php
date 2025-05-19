<x-vendor.layout-vendor title="Dashboard">
    {{-- <x-sidebar-vendor /> --}}
    <!-- Main Content -->
    <main class="py-10 px-8 sm:ml-64 h-screen mt-15">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenue, {{ $user->name }} </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Statistique 1</h2>
                    <p class="text-gray-600 mt-2">Chiffre d'affaires, visites, etc.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Statistique 2</h2>
                    <p class="text-gray-600 mt-2">Nombre de produits, avis, etc.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">Statistique 3</h2>
                    <p class="text-gray-600 mt-2">Commandes récentes, etc.</p>
                </div>
            </div>
        </main>

</x-vendor.layout-vendor>

