<x-layout title='Produits'>

    <x-sidebar-other :user="$user"/>
    <!-- Produits -->

    <section class="pb-10  md:ml-64 bg-[#D6D2FF] mt-18" >
        <x-success />
    <div class="bg-white p-4 shadow-md rounded-lg">
        <div class="flex flex-wrap justify-between items-center px-2 py-5" >
            <h2 class="text-2xl font-bold my-2">Tous les produits ({{ $productsCount }})</h2>
            <form class="max-w-lg">
                <div class="flex">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center  border border-gray-300 rounded-s-lg focus:ring-4 focus:outline-none focus:ring-gray-100 bg-blue-500  text-white cursor-pointer sm:hidden" type="button">{{ $categories->firstWhere('id', request('category_id'))->title ?? 'Toutes les catégories' }} <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-md w-44 h-100 overflow-y-scroll">
                        <ul class=" text-sm text-gray-700  text-center " aria-labelledby="dropdown-button">
                        <li class="cursor-pointer px-5 py-6 hover:bg-gray-300">
                            <a href="{{ route('products.index')}}" class="w-full ">Toutes les catégories</a>
                        </li>
                        @foreach ($categories as $category)

                        <li class="cursor-pointer px-5 py-6 hover:bg-gray-300">
                            <a href="{{ route('products.index', ['category_id' => $category->id]) }}" class="w-full ">{{ $category->title }}</a>
                        </li>
                        @endforeach

                        </ul>
                    </div>
                    <div class="relative w-full">
                        <form action="{{ route('products.index') }}" method="GET" >
                            <input type="hidden" name="category_id" value="{{ request('category_id') }}">

                            <input type="search" name="search" value="{{ request('search') }}" id="search-dropdown" class="block p-2.5 w-full pr-10 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Recherche" />
                            

                            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
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
        <!-- Titre -->
        <div class="hidden sm:block">

            <h3 class="text-lg font-bold my-3">Les catégories</h3>

            <div class="relative px-10">
                <!-- Bouton de défilement vers la gauche -->
                <button id="scrollLeft" class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white p-2 shadow hover:bg-gray-100">
                    <!-- Icône flèche gauche -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <!-- Conteneur des catégories -->
                <div id="categoryContainer" class="flex items-center overflow-x-auto no-scrollbar snap-x snap-mandatory space-x-4 scroll-smooth ">

                    <!-- Liste des catégories -->

                    {{-- @foreach ($categories as $category)
                    <a href="#" class="flex-shrink-0 px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-blue-100 hover:text-blue-700 transition-colors duration-200 snap-start">
                        {{ $category->title }}
                    </a>
                    @endforeach --}}
                    <a href="{{ route('products.index') }}"
                        class="flex-shrink-0 px-4 py-2 {{ request('category_id') ? 'bg-white text-gray-800' : 'bg-blue-600 text-white' }} border border-gray-300 rounded-md shadow-sm hover:bg-blue-100 transition-colors duration-200 snap-start">
                    Tous
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
                        class="flex-shrink-0 px-4 py-2 {{ request('category_id') == $category->id ? 'bg-blue-600 text-white' : 'bg-white text-gray-800' }} border border-gray-300 rounded-md shadow-sm hover:bg-blue-100 transition-colors duration-200 snap-start">
                            {{ $category->title }}
                        </a>
                    @endforeach


                </div>

                <!-- Bouton de défilement vers la droite -->
                <button id="scrollRight" class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white p-2 shadow hover:bg-gray-100">
                    <!-- Icône flèche droite -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="mx-auto p-9 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-5">
            @if ($products->isEmpty())
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">Aucun produit trouvé.</p>
                </div>

            @endif
    @foreach ($products as $product)
        <div class="relative bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex flex-col">
            @if ($product->boosted_until > now())
                <span class="absolute left-4 top-4 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Sponsorisé</span>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute right-4 top-4 w-7 h-7 text-yellow-400 cursor-pointer">
                <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                </svg>
            @endif
        <a href="{{ route('product.show', $product) }}">
        <img src="/storage/{{ $product->image }}" alt="Produit" class="w-70 h-70 object-cover rounded-t-2xl mx-auto">
        </a>

    <!-- Contenu vertical réparti -->
    <div class="p-5 flex flex-col flex-1 justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $product->title }}</h3>
            <p class="text-gray-400">{{ $product->created_at->diffForHumans() }}</p>
            <p class="text-sm text-gray-600 group-hover:text-white mb-2" id="desc-{{ $product->id }}">
                {{ Str::limit($product->description, 60) }}
                @if(strlen($product->description) > 60)
                    <button
                        class="text-xs text-blue-700 bg-white px-2 py-1 rounded mt-2 ml-2 font-medium group-hover:bg-white hover:bg-blue-100 transition"
                        data-full-description="{{ $product->description }}"
                        onclick="showFull({{ $product->id }}, this)">
                        Lire plus
                    </button>
                @endif
            </p>
            <p class="text-blue-800 text-lg font-bold mt-3">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
            <p class="text-gray-500 text-sm mt-1">Stock: {{ $product->quantity }}</p>
        </div>

        <!-- Boutons en bas -->
        <div class="mt-4">
            @if(!Auth::check())
                <form action="{{ route('cart.add') }}#prod" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit" class="cursor-pointer w-full  bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Ajouter au panier
                    </button>
                </form>
            @endif
            @role('customer')
                @if(isset($cart[$product->id]))
                <button disabled class="w-full bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed flex items-center gap-2 justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Déjà dans le panier
                    </button>
                @else

                <form action="{{ route('cart.add') }}#prod" method="POST" class="w-full">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit" class="cursor-pointer w-full  bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        Ajouter au panier
                    </button>
                </form>
                @endif
            @endrole
            @role('vendor')
                <button disabled class="w-full bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        Ajouter au panier
                </button>
            @endrole
            @role('admin')
                <button disabled class="w-full bg-gray-400 text-white py-2 rounded-lg cursor-not-allowed flex items-center gap-2 justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        Ajouter au panier
                </button>
            @endrole
        </div>
    </div>
</div>

            @endforeach
        </div>
        <nav class="mt-8 flex justify-center">
            <ul class="inline-flex items-center space-x-1 text-sm">
                {{-- Page précédente --}}
                @if ($products->onFirstPage())
                    <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </li>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="">
                        <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                    </a>
                @endif

                {{-- Liens de page --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <li>
                        @if ($page == $products->currentPage())
                            <span class="px-3 py-2 bg-blue-600 text-white font-bold rounded-md">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-blue-100">{{ $page }}</a>
                        @endif
                    </li>
                @endforeach

                {{-- Page suivante --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="">
                        <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </li>
                    </a>
                @else
                    <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </li>
                @endif
            </ul>
        </nav>


    </section>

</x-layout>
