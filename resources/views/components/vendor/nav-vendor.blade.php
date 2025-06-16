<nav class="fixed w-full z-50 top-0 start-0 bg-gradient-to-r from-blue-500 to-blue-800 text-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <div class="flex items-center gap-4">
            <a href="" class="flex items-center gap-1 rtl:space-x-reverse">
                <img src="{{ asset('images/icons.png')}}" class="h-8 md:h-10" alt="MarketPlace Logo">
                <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap">MarketPlace</span>
            </a>
            <span class="hidden sm:inline-block self-center text-lg md:text-2xl font-semibold whitespace-nowrap">Espace vendeur</span>
        </div>

        <div class="flex gap-2 md:gap-3 items-center">
            <!-- Menu profil -->
            <div x-data="{ open: false }" class="w-8 h-8 md:w-10 md:h-10 relative inline-block text-left">
                <button @click="open = !open" class="focus:outline-none cursor-pointer">
                    <img src="/storage/{{ Auth::user()->image }}"
                        alt="Photo de profil"
                        class="w-full h-full rounded-full object-cover border bg-white border-gray-300 shadow">
                </button>
                <div x-show="open"
                    x-cloak
                    @click.away="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                    <div class="absolute -top-2 right-2 rotate-45 -z-1 bg-white w-6 h-6"></div>
                    <a href="{{ route('vendor.info') }}"
                    class="px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 md:w-6 md:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                        </svg>
                        Informations personnelles
                    </a>

                    <a href="{{ route('vendor.password') }}"
                    class="px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 md:w-6 md:h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                        Sécurité du compte
                    </a>
                </div>
            </div>

            <!-- Bouton Déconnexion -->
            <form method="POST" action="{{ route('logout.store') }}">
                @csrf
                <button type="submit" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 md:text-sm md:px-4 md:py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <span class="hidden sm:inline">Déconnexion</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 sm:hidden">
                        <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
