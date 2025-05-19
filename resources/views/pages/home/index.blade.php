<x-layout title='Acceuil'>

    <x-sidebar />
    <!-- Hero section -->
<section id="section-1" class="relative h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-header.jpg') }}');">
    <div class="absolute inset-0 bg-[#00000091]  flex flex-col justify-center items-center text-center px-4 ">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 drop-shadow-lg">Bienvenue sur notre Marketplace</h2>
        <p class="text-xl md:text-2xl text-purple-300 font-medium">Trouvez les meilleurs produits au meilleur prix</p>
    </div>
</section>

    <!-- Produits -->


    <section class="p-4 sm:ml-64">
        <div class="flex flex-wrap justify-between items-center px-2 py-10">
            <h2 class="text-2xl font-bold my-2">Les produits (3)</h2>
            <form class="max-w-lg">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium sr-only text-white">Your Email</label>
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center bg-white border border-gray-300 rounded-s-lg focus:ring-4 focus:outline-none focus:ring-gray-100 hover:bg-blue-500  text-gray-800 hover:text-white cursor-pointer" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-300">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-300">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-300">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-300">Mockups</button>
                        </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-300 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:border-blue-500" placeholder="Search" required />
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                    </div>
            </form>
        </div>

        <div class="mx-auto p-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @for ($i = 1; $i <= 6; $i++)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300">
                    <img src="https://via.placeholder.com/300x200" alt="Produit" class="w-full h-48 object-cover rounded-t-2xl">
                    <div class="p-5">
                        <h3 class="text-lg font-semibold text-gray-800">Produit #{{ $i }}</h3>
                        <p class="text-gray-500 text-sm mt-1">Description courte du produit...</p>
                        <p class="text-indigo-600 font-bold mt-3">€{{ 10 * $i }}</p>
                        <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Acheter</button>
                    </div>
                </div>
                @endfor
        </div>
    </section>

</x-layout>
