<aside class="fixed top-0 pt-20 left-0 w-64 h-screen bg-white shadow-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-4">Mon espace</h2>
        <p class="text-sm text-gray-500 mt-1 font-semibold">{{ Auth::user()->email }}</p>
    </div>
    <nav class="mt-6">
        <ul class="space-y-2 px-4">
            <li>
                <a href="{{ route('vendor.dashboard.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    🏠 <span class="ml-2">Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.shop.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    🏪 <span class="ml-2">Ma boutique</span>
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.products.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    📦 <span class="ml-2">Mes produits</span>
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.orders.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    📄 <span class="ml-2">Commandes</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout.store') }}">
                    @csrf
                    <button type="submit" class="flex items-center w-full p-2 text-red-600 hover:bg-red-100 rounded-lg">
                            🚪 <span class="ml-2">Déconnexion</span>
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="absolute bottom-0 left-0 w-full p-4 bg-gray-100">
        <p class="text-sm text-center text-gray-500">© {{ date('Y') }} MarketPlace. Tous droits réservés.</p>
    </div>

</aside>
