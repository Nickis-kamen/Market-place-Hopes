<x-vendor.layout-vendor title="Tableau de bord vendeur">
<div class="py-10 sm:ml-64 px-6 space-y-10 mt-18">

    <!-- En-tête de bienvenue -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Bienvenue, {{ $user->name }} 👋</h1>
            <p class="text-sm text-gray-500">Voici un aperçu de votre activité récente</p>
        </div>
        <div>
            @if($shop)
            <a href="{{ route('vendor.products.create') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Ajouter un produit
            </a>
            @else
            <a href="{{ route('vendor.shop.index') }}"
               class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Veuillez créer votre boutique
            </a>
            @endif
        </div>
    </div>
    @if($shop)
    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500 cursor-pointer">
            <p class="flex items-center gap-2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-indigo-700  w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                Produits en vente</p>
            <p class="text-3xl font-bold text-indigo-700 mt-1">{{ $products->count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-400 cursor-pointer">
            <p class="flex items-center gap-2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-yellow-500  w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                </svg>
                Produits boostés</p>
            <p class="text-3xl font-bold text-yellow-500 mt-1">{{ $boostedCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 cursor-pointer">
            <p class="flex items-center gap-2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600  w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>
                Commandes ce mois</p>
            <p class="text-3xl font-bold text-green-600 mt-1">{{ $monthlyOrdersCount }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-500 cursor-pointer">
            <p class="flex items-center gap-2 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600  w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                </svg>
                Revenus mensuels</p>
            <p class="text-3xl font-bold text-emerald-600 mt-1">{{ number_format(($monthlyRevenue)*0.9, 0, ',', ' ') }} Ar</p>
        </div>
    </div>

    <!-- Graphique de performance (placeholder) -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Performance des ventes</h2>
        <div class="w-full bg-gray-100 rounded flex items-center justify-center text-gray-400">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Graphique des ventes (7 derniers jours)</h2>
                <canvas id="salesChart" width="650" height="300"></canvas>
            </div>
        </div>
    </div>

    <!-- Produits récents -->
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Produits récents</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($recentProducts as $product)
                <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
                    <div class="bg-cover bg-no-repeat rounded" style="background-image: url('{{ asset('images/wave.svg') }}');">
                        <img src="/storage/{{ $product->image }}" class="rounded w-50 mx-auto h-50 object-cover mb-3" alt="Produit">
                    </div>
                    <h3 class="text-md font-semibold text-gray-800">{{ $product->title }}</h3>
                    <p class="text-sm text-blue-600 font-bold"><span class="font-light text-gray-600">Prix : </span>{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                    @if($product->boosted_until && $product->boosted_until >= now())
                        <span class="inline-block mt-2 px-2 py-1 text-xs bg-yellow-100 text-yellow-600 rounded">
                            Boosté (jusqu'au {{ $product->boosted_until }})
                        </span>
                    @endif
                </div>
            @empty
                <p class="text-gray-500">Aucun produit trouvé.</p>
            @endforelse

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const data = @json($data);

        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ventes (en Ar)',
                    data: data,
                    backgroundColor: 'rgba(75, 192, 192, 0.4)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-500 cursor-pointer">
                <p class="flex items-center gap-2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-indigo-700  w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    Produits en vente</p>
                <p class="text-3xl font-bold text-indigo-700 mt-1">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-400 cursor-pointer">
                <p class="flex items-center gap-2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-yellow-500  w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                    </svg>
                    Produits boostés</p>
                <p class="text-3xl font-bold text-yellow-500 mt-1">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500 cursor-pointer">
                <p class="flex items-center gap-2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600  w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                    </svg>
                    Commandes ce mois</p>
                <p class="text-3xl font-bold text-green-600 mt-1">0</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-500 cursor-pointer">
                <p class="flex items-center gap-2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600  w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    Revenus mensuels</p>
                <p class="text-3xl font-bold text-emerald-600 mt-1">{{ number_format(0, 0, ',', ' ') }} Ar</p>
            </div>
        </div>

        <!-- Graphique de performance (placeholder) -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Performance des ventes</h2>
            <div class="w-full bg-gray-100 rounded flex items-center justify-center text-gray-400">
                <div class="text-center p-6">
                    <h2 class="text-xl font-semibold mb-4">Graphique des ventes (7 derniers jours)</h2>
                     [📈 Graphique des ventes ici]
                </div>
            </div>
        </div>

        <!-- Produits récents -->
        <div>
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Produits récents</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <p class="text-gray-500">Aucun produit trouvé.</p>
            </div>
        </div>
    @endif
</div>
</x-vendor.layout-vendor>
