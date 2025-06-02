<x-layout title='Catégories'>

    <x-sidebar-other :user="$user"/>
    <!-- Produits -->

    <section class="p-4 sm:ml-64 bg-[#D6D2FF] mt-18" >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-12 text-center">
                Produits dans la catégorie : <span class="text-indigo-600">{{ $category->title }}</span>
            </h1>
            @if($products->count())
            <p class="text-center text-gray-600 mb-6">Il y a produit(s) {{ $products->total() }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <div class="bg-white shadow rounded-2xl p-4 hover:shadow-lg transition">
                            <a href="{{ route('product.show', $product) }}">
                                <div class="w-full h-40 overflow-hidden rounded-xl mb-3">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                                </div>
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
                                <h3 class="text-lg font-semibold text-gray-800">{{ $product->title }}</h3>
                                <p class="text-gray-600 text-sm mt-1 truncate">{{ Str::limit($product->description, 60) }}</p>
                                <p class="text-blue-800 text-lg font-bold mt-3">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                            </a>
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
            @else
                <p class="text-center text-gray-500">Aucun produit trouvé dans cette catégorie.</p>
            @endif
        </div>
    </section>

</x-layout>
