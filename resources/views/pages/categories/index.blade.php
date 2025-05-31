<x-layout title='Catégories'>

    <x-sidebar-other :user="$user"/>
    <!-- Produits -->

    <section class="p-4 sm:ml-64 bg-[#D6D2FF] mt-18" >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-extrabold text-gray-800 mb-8 text-center">Toutes les catégories</h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                @forelse ($categories as $category)
                    <a href="" class="group block bg-white shadow-md rounded-2xl p-4 hover:shadow-xl transition-all duration-300 text-gray-700 hover:bg-blue-500 hover:text-white" >
                        <div class="w-full mb-3 rounded-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                <path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                <path d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                            </svg>
                        </div>
                        <div class="text-center">
                            <span class="text-base font-semibold">{{ $category->title }}</span>
                        </div>
                    </a>
                @empty
                    <p class="col-span-full text-center text-gray-500">Aucune catégorie trouvée.</p>
                @endforelse
            </div>
        </div>
    </section>

</x-layout>
