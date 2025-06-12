<nav class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-blue-800 to-blue-00 text-white" id="navbar">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center gap-1 rtl:space-x-reverse">
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
            <a href="">
                <img src="/storage/{{(Auth::user()->image) }}" alt="pdp" class="w-10 h-10 rounded-full object-cover border border-white  bg-white">
            </a>
        </div>
        @else
            <a class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focu s:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mx-2" href="{{ route('auth.register.customer') }}">Inscription</a>
            <a class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" href="{{ route('auth.login') }}">Connexion</a>
        @endif

        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
    </div>
    <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:gap-5 md:flex-row md:mt-0 ">
        {{-- <li></li> --}}
        <li class="">
          <a href="/" class="block  hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-500 md:p-0" aria-current="page">Accueil</a>
        </li>
        <li>
          <a href="#" class="block hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-500 md:p-0">A propos</a>
        </li>
        <li>
          <a href="#" class="block hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-500 md:p-0">Produits</a>
        </li>
        <li>
          <a href="#" class="block hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-500 md:p-0">Contact</a>
        </li>
      </ul>
    </div>
    </div>
</nav>
