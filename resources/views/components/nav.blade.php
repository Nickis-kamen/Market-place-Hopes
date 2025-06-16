<nav class="fixed w-full z-50 top-0 start-0 bg-gradient-to-r from-blue-800 to-blue-00 text-white" id="navbar">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="" class="flex items-center gap-1 rtl:space-x-reverse">
        <img src="{{ asset('images/icons.png')}}" class="h-10" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap">MarketPlace</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        @if (Auth::check())
        <div class="flex gap-5 items-center">
            <a href="{{ route('cart.index') }}" class="relative inline-flex items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                </svg>
                @if(count($cart) > 0)
                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2">{{ count($cart) }}</div>
                @endif
            </a>


            </a>
            <div x-data="{ open: false }" class="w-10 h-10 relative text-left">
            <button @click="open = !open" class="focus:outline-none cursor-pointer">
                <img src="/storage/{{ Auth::user()->image }}"
                    alt="pdp"
                    class="w-10 h-10 rounded-full object-cover border bg-white border-gray-300 shadow">
            </button>
            <div x-show="open"
                x-cloak
                @click.away="open = false"
                x-transition
                class="absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                <div class="absolute -top-2 right-2 rotate-45 -z-1 bg-white w-6 h-6"></div>
                <a href="{{ route('info') }}"
                class=" px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>

                    Informations personnelles
                </a>

                <a href="{{ route('password') }}"
                class=" px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 flex items-center gap-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>

                    Sécurité du compte
                </a>
            </div>
        </div>
        </div>
        @else
            <a class="hidden md:block cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focu s:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2" href="">Inscription</a>
            <a class="hidden md:block cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('auth.login') }}">Connexion</a>
        @endif

        <button data-collapse-toggle="navbar-sticky" type="button" class="cursor-pointer inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:gap-5 md:flex-row md:mt-0 ">
        {{-- <li></li> --}}
        <li class="relative group">
            <div class="hidden md:block abs absolute -top-15 w-7 h-7 left-1/2 -translate-x-1/2 rotate-45 bg-white group-hover:-top-11 transition-all duration-300 shadow-lg"></div>
          <a href="/" class="block  hover:bg-blue-500 p-2 md:hover:bg-transparent  md:p-0" aria-current="page">Accueil</a>
        </li>
        <li class="relative group">
            <div class="hidden md:block abs absolute -top-15 w-7 h-7 left-1/2 -translate-x-1/2 rotate-45 bg-white group-hover:-top-11 transition-all duration-300 shadow-lg"></div>
          <a href="/products" class="block  hover:bg-blue-500 p-2 md:hover:bg-transparent  md:p-0" aria-current="page">Produits</a>
        </li>
        <li class="relative group">
            <div class="hidden md:block abs absolute -top-15 w-7 h-7 left-1/2 -translate-x-1/2 rotate-45 bg-white group-hover:-top-11 transition-all duration-300 shadow-lg"></div>
          <a href="/shops" class="block  hover:bg-blue-500 p-2 md:hover:bg-transparent  md:p-0" aria-current="page">Boutiques</a>
        </li>
        <li class="relative group">
            <div class="hidden md:block abs absolute -top-15 w-7 h-7 left-1/2 -translate-x-1/2 rotate-45 bg-white group-hover:-top-11 transition-all duration-300shadow-lg"></div>
          <a href="/contact" class="block  hover:bg-blue-500 p-2 md:hover:bg-transparent  md:p-0" aria-current="page">Contact</a>
        </li>

      </ul>
    </div>
    </div>
</nav>
