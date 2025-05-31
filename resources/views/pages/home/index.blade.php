<x-layout title='Acceuil'>

    <x-sidebar :user="$user"/>
    <!-- Hero section -->
<section id="section-1" class="relative h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-header.jpg') }}');">
    <div class="absolute inset-0 bg-[#00000091]  flex flex-col justify-center items-center text-center px-4 ">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6 drop-shadow-lg">Bienvenue sur notre Marketplace</h2>
        <p class="text-xl md:text-2xl text-purple-300 font-medium">Trouvez les meilleurs produits au meilleur prix</p>
    </div>
</section>

    <!-- Produits -->


    <section class="sm:ml-64 bg-[#D6D2FF]" id="prod">
        <div class="flex flex-wrap justify-between items-center px-9 py-5 bg-white shadow-lg" >
            <h2 class="flex items-center gap-2 text-2xl font-bold my-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                Nos produits
            </h2>
            <div class="max-w-lg">
                    <div class="relative w-full">
                        <form action="{{ route('index') }}#prod" method="GET" >
                            <input type="hidden" name="category_id" value="{{ request('category_id') }}">

                            <input type="search" name="search" value="{{ request('search') }}" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-100 rounded-e-lg rounded-lg border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:placeholder-gray-400 dark:focus:border-blue-500" placeholder="Search"  />
                            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                                <span class="sr-only">Recherche</span>
                            </button>
                        </form>
                    </div>
                    </div>
            </form>
        </div>

        <div class="mx-auto p-9 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-5">
            @foreach ($products as $product)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300" >
                <img src="/storage/{{ $product->image }}" alt="Produit" class="w-70 h-70 object-cover rounded-t-2xl mx-auto">
                <div class="p-5">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $product->title }}</h3>
                    {{-- <div class="flex flex-wrap gap-1 mb-3">
                        @foreach ($product->categories as $category)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                {{ $category->title }}
                            </span>
                        @endforeach
                    </div> --}}
                    <p class="text-gray-400">{{ $product->created_at->diffForHumans() }}</p>
                    <p class="text-gray-500 text-sm mt-1">{{ Str::limit($product->description, 50) }}</p>
                    <p class="text-blue-800 text-lg font-bold mt-3">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                    <p class="text-gray-500 text-sm mt-1">Stock: {{ $product->quantity }}</p>
                    <div class="flex justify-end">
                        <a href="{{ route('product.show', $product) }}" class="bg-[#6198ff] px-4 py-2 rounded-lg text-white hover:bg-[#7cb5ff] transition flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        Voir</a>
                    </div>
                    <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    Ajouter au panier</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center pb-5">
            <a href="{{ route('products.index') }}" class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition">
                Voir tous les produits
            </a>
        </div>
    </section>
    <section class="px-4 py-10 sm:ml-64 bg-no-repeat bg-[#6198ff] bg-cover" style="background-image: url('{{ asset('images/wave.svg') }}');" >
        <h2 class="text-2xl font-bold text-center mb-6">Nos Boutiques</h2>
        <div class="relative px-10">

            <!-- Bouton de défilement vers la gauche -->
            <button id="ShopscrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white p-2 shadow hover:bg-gray-100">
                <!-- Icône flèche gauche -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>


            <div id="ShopContainer" class="flex items-center overflow-x-auto no-scrollbar snap-x snap-mandatory space-x-4 scroll-smooth py-5 px-2">

                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-600 hover:text-white">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>
                <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg w-75 flex-shrink-0 p-4 flex flex-col items-center">
                    <img src="{{ asset('images/bg-header.jpg') }}" alt="" class="w-30 h-30 object-cover mb-4 rounded-full">
                    <h3 class="text-lg font-semibold mb-2">Shop</h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <a href="" class="mt-auto inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Voir les produits</a>
                </div>

            </div>

            <!-- Bouton de défilement vers la droite -->
            <button id="ShopscrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white p-2 shadow hover:bg-gray-100">
                <!-- Icône flèche droite -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </section>
    <section class="py-10 px-4 sm:ml-64 bg-cover" style="background-image: url('{{ asset('images/waves.svg') }}');">
        <h2 class="text-3xl font-bold text-white text-center mb-10">Produits Populaires</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4">
            @foreach ($productsPopulaire as $product)
            <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg p-4 text-center">
                <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover mb-4">
                <h3 class="text-lg font-semibold text-white mt-2">{{ $product->title }}</h3>
                    <div class="mt-2 mb-2 flex items-center space-x-1 justify-center">
                            {{-- Affichage des étoiles de notation --}}
                            @for ($i = 1; $i<= $product->averageRating(); $i++  )
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                </svg>
                            @endfor
                            @for ($i = $product->averageRating(); $i< 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            @endfor

                    </div>
                <p class="text-white font-bold mb-2">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                <a href="" class="inline-block bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-600 hover:text-white">Voir le produit</a>
            </div>
            @endforeach
        </div>
    </section>

</x-layout>
