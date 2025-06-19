<x-layout title='Acceuil'>

    <x-sidebar :user="$user"/>
    <!-- Hero section -->
    <x-success />
<section id="section-1" class="relative h-screen">
    <!-- Swiper -->
    <div class="swiper hero-swiper h-screen">
        <div class="swiper-wrapper">
            <div class="swiper-slide h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-header.jpg') }}');"></div>
            <div class="swiper-slide h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-header2.jpg') }}');"></div>
            <div class="swiper-slide h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/bg-header3.jpg') }}');"></div>
        </div>
    </div>

    <!-- Overlay + Texte -->
    <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-center text-center px-4 z-10">

    <h2 data-aos="fade-up"
        data-aos-delay="600"
        class="text-4xl md:text-5xl font-extrabold text-white mb-4 drop-shadow-[0_1px_1px_rgba(255,255,255,0.5)] leading-tight ">
        Bienvenue sur notre <span class="text-blue-200 drop-shadow-xl">Marketplace</span>
    </h2>

    <p class="text-lg text-gray-200 max-w-xl font-medium">
        Découvrez une large sélection de produits de qualité au meilleur prix, proposés par nos vendeurs de confiance.
    </p>
</div>

</section>

    <!-- Produits -->


    <section class="md:ml-64 bg-[#D6D2FF]" id="prod">
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

    <div class=" mx-auto p-9 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-5">
        @if ($products->isEmpty())
                <div class="col-span-3 text-center">
                    <p class="text-gray-500">Aucun produit trouvé.</p>
                </div>

        @endif
    @foreach ($products as $index => $product)
        <div data-aos="fade-up"
        data-aos-delay="{{ $index * 100 }}"
        class="relative bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 flex flex-col ">
            @if ($product->boosted_until > now())

                <span class="absolute left-4 top-4 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Sponsorisé</span>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute right-4 top-4 w-7 h-7 text-yellow-400 cursor-pointer">
                <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                </svg>
            @endif

        <img src="/storage/{{ $product->image }}" alt="Produit" class="w-70 h-70 object-cover rounded-t-2xl mx-auto">

    <!-- Contenu vertical réparti -->
    <div class="p-5 flex flex-col flex-1 justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-3">{{ $product->title }}</h3>
            <p class="text-gray-400">{{ $product->created_at->diffForHumans() }}</p>
            <p class="text-sm text-gray-600 group-hover:text-white mb-2" id="desc-{{ $product->id }}">
                {{ Str::limit($product->description, 20) }}
                @if(strlen($product->description) > 20)
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
            <div class="flex justify-end mb-2">
                <a href="{{ route('product.show', $product) }}" class="bg-[#6198ff] px-4 py-2 rounded-lg text-white hover:bg-[#7cb5ff] transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Voir
                </a>
            </div>
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
        <div class="text-center pb-5">
            <a href="{{ route('products.index') }}" class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition">
                Voir tous les produits
            </a>
        </div>
    </section>
    <section class="px-4 py-10 md:ml-64 bg-no-repeat bg-[#6198ff] bg-cover" style="background-image: url('{{ asset('images/wave.svg') }}');">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-700 mb-10">Nos Boutiques</h2>
        <div class="relative px-4 md:px-10">
            <div class="swiper shop-swiper">
                <div class="swiper-wrapper">
                    @foreach ($shops as $shop)
                    <div class="swiper-slide flex justify-center">
                        <div class="group relative overflow-hidden rounded-2xl w-full md:max-w-2xl bg-white/20 border border-white/30 backdrop-blur-xl shadow-lg p-6 text-center text-gray-800 hover:bg-blue-500 hover:text-white transition duration-300">
                            <!-- Image -->
                            <img src="/storage/{{ $shop->image }}" alt="{{ $shop->name }}"
                                class="w-24 h-24 object-cover mb-4 rounded-full border-2 border-white shadow mx-auto transition duration-300 group-hover:scale-105">

                            <!-- Titre -->
                            <h3 class="text-lg font-bold mb-1 group-hover:text-white transition duration-300">{{ $shop->name }}</h3>

                            <!-- Description -->
                            <p class="text-sm text-gray-700 group-hover:text-gray-100 mb-10 transition duration-300">
                                {{ Str::limit($shop->description, 50) }}
                            </p>

                            <!-- Slide-in Button -->
                            <div class="absolute bottom-0 left-0 w-full
                                        translate-y-0
                                        md:translate-y-full
                                        md:group-hover:translate-y-0
                                        transition-transform duration-500">
                                <a href="{{ route('shop.show', $shop ) }}"
                                class="block bg-white text-blue-600 font-medium py-2 rounded-t-xl hover:bg-gray-200 transition duration-300">
                                    Voir la boutique
                                </a>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    <div class="swiper-pagination "></div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-prev !-mt-12 !hidden md:!block  !text-white"></div>
                <div class="swiper-button-next !-mt-12 !mr-3 !hidden md:!block !text-white"></div>
            </div>
        </div>
    </section>


    <section class="py-10 px-4 md:ml-64 bg-cover" style="background-image: url('{{ asset('images/waves.svg') }}');">
        <h2 class="text-3xl font-bold text-white text-center mb-10">Produits Populaires</h2>
        <div class="relative px-4 md:px-10">
            <div class="swiper product-swiper">
                <div class="swiper-wrapper">
                    @foreach ($productsPopulaire as $product)
                    <div class="swiper-slide flex justify-center">
                        <div class="group relative overflow-hidden w-full md:max-w-2xl backdrop-blur-lg bg-white/10 border border-white/20 rounded-xl shadow-lg p-4 text-center">
                            <img src="/storage/{{ $product->image }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover mb-4 mx-auto">
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
                            <p class="text-white font-bold mb-12">{{ number_format($product->price, 0, ',', ' ') }} Ar</p>
                            <div class="absolute bottom-2 left-0 w-full
                                            translate-y-0
                                            md:translate-y-full
                                            md:group-hover:translate-y-0
                                            transition-transform duration-500">
                                <a href="{{ route('product.show', $product) }}" class="inline-block bg-white text-blue-600 px-4 py-2 rounded hover:bg-blue-600 border hover:border-white hover:text-white">Voir le produit</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    <div class="swiper-pagination "></div>
                </div>

                <!-- Navigation buttons -->
                <div class="swiper-button-prev !-mt-12 !hidden md:!block  !text-white"></div>
                <div class="swiper-button-next !-mt-12 !mr-3 !hidden md:!block !text-white"></div>
            </div>
        </div>
    </section>

</x-layout>
