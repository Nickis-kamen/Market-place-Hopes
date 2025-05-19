<nav class="fixed w-full z-20 top-0 start-0 bg-gradient-to-r from-blue-900 to-blue-900 text-white shadow-lg" >
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center gap-1 rtl:space-x-reverse">
        <img src="{{ asset('images/icons.png')}}" class="h-10" alt="Flowbite Logo">
        <span class="self-center text-2xl font-semibold whitespace-nowrap">MarketPlace</span>
    </a>
    <span class="self-center text-2xl font-semibold whitespace-nowrap">Espace Administrateur</span>
    <div class="flex gap-3 items-center">
        <a href="">
            <img src="../{{ Auth::user()->image }}" alt="pdp" class="w-10 h-10 rounded-full object-cover border border-white  bg-white">
        </a>
        <form method="POST" action="{{ route('logout.store') }}">
            @csrf
            <button type="submit" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Déconnexion</button>
        </form>
    </div>
    </div>
</nav>
