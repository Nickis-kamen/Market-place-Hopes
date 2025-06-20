<button
    data-drawer-target="default-sidebar"
    data-drawer-toggle="default-sidebar"
    aria-controls="default-sidebar"
    type="button"
    class="fixed md:hidden z-40 top-18 left-3 inline-flex items-center p-2 text-black mt-2 text-sm rounded-lg hover:bg-blue-500 hover:text-white focus:outline-none focus:ring-gray-200 ">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="default-sidebar" class="z-40 fixed top-0 pt-20 transition-transform -translate-x-full duration-100 ease-in-out md:translate-x-0 left-0 w-64 h-screen bg-white shadow-lg">
    <div class="p-6">
        <h2 class="text-2xl font-bold text-blue-600 mb-4">Mon espace</h2>
        <p class="text-sm text-gray-500 mt-1 font-semibold">{{ Auth::user()->email }}</p>
        <a href="/"
            class="mt-5 inline-flex items-center px-2 py-1 bg-blue-600 hover:bg-blue-700 text-white
            text-sm rounded shadow-md transition duration-300 ease-in-out">
            Voir dans l’espace client
            </a>
    </div>
    <nav class="mt-2">
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
                <a href="{{ route('vendor.orders.index') }}" class="flex justify-between items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    <span class="">📄 Commandes</span>
                        @if ($newOrdersCount > 0)
                            <span class="bg-red-500 text-white font-bold text-xs px-2 py-0.5 rounded-full">
                                {{ $newOrdersCount }}
                            </span>
                        @endif
                </a>
            </li>
            <li>
                <a href="{{ route('vendor.stripe') }}" class="flex items-center p-2 text-gray-700 hover:bg-blue-100 rounded-lg">
                    💲 <span class="ml-2">Connexion stripe</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout.store') }}">
                    @csrf
                    <button type="submit" class="cursor-pointer flex items-center w-full p-2 text-red-600 hover:bg-red-100 rounded-lg">
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
