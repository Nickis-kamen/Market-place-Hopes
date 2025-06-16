<x-admin.layout-admin title="Dashboard">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-50 mt-18">
        <h1 class="text-4xl font-bold text-gray-700 mb-10 text-center">Tableau de bord</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-10">
            <div class="">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Bienvenue, {{ $user->name }}</h2>
                <p class="text-gray-500 mb-8">Voici un aperçu des activités de la plateforme.</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between mb-2">
                        <h2 class="text-sm font-medium text-gray-600">Chiffre d'affaires</h2>
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-3xl font-bold text-blue-700">{{ number_format($total, 0, ',', ' ') }} Ar</p>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Produits -->
            <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-sm font-medium text-gray-600">Produits</h2>
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 16V8a2 2 0 00-2-2h-4l-2-2h-2l-2 2H5a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-blue-600">{{ $productCount }}</p>
            </div>

            <!-- Vendeurs -->
            <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-sm font-medium text-gray-600">Vendeurs</h2>
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M4 6h16M4 10h16M4 14h10m-6 4h6"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-green-600">{{ $vendorCount }}</p>
            </div>

            <!-- Clients -->
            <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-sm font-medium text-gray-600">Clients</h2>
                    <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z"/>
                    </svg>
                </div>
                <p class="text-3xl font-bold text-purple-600">{{ $customerCount }}</p>
            </div>

            <!-- Chiffre d'affaires -->


            <div class="bg-white rounded-2xl p-6 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-sm font-medium text-gray-600">Revenu Admin</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                </div>
                <p class="text-3xl font-bold text-yellow-600">{{ number_format($adminRevenue, 0, ',', ' ') }} Ar</p>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Graphique des ventes -->
            <div class="bg-white p-6 rounded-2xl shadow">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Ventes des 7 derniers jours</h3>
                <canvas id="salesChart" height="200"></canvas>
            </div>

            <!-- Graphique des nouveaux utilisateurs -->
            <div class="bg-white p-6 rounded-2xl shadow">
                <h3 class="text-xl font-semibold text-gray-700 mb-4">Nouveaux utilisateurs</h3>
                <canvas id="userChart" height="200"></canvas>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labelsSales = @json($labelsSales);
        const labelsUser = @json($labelsUser);
        const dataSales = @json($dataSales);
        const dataUser = @json($dataUser);
        const salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: labelsSales, // ex: ['04 Juin', '05 Juin', ...]
                datasets: [{
                    label: 'Ventes en Ar',
                    data: dataSales, // ex: [2, 5, 3, 7, 0, 4, 1]
                    backgroundColor: '#3b82f6',
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        const userChart = new Chart(document.getElementById('userChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: labelsUser,
                datasets: [{
                    label: 'Inscriptions',
                    data: dataUser, // ex: [1, 3, 2, 4, 0, 1, 5]
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.2)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true,
                    ticks: {
                    stepSize: 1
                    }
                }
            }
        }
    });
    </script>

</x-admin.layout-admin>
