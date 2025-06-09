<x-layout title="Détails du produit">

    <x-sidebar-other :user="$user"/>

    {{-- Contenu principal --}}
    <div  class=" py-10 sm:ml-64 mt-18 ">
        <div class="max-w-6xl mx-auto px-4">
    {{-- Grille image + infos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-2xl shadow-lg">

                {{-- Image produit à gauche --}}
                <div class="relative bg-cover rounded-2xl shadow-md bg-no-repeat" style="background-image: url('{{ asset('images/wave.svg') }}');">
                    @if ($product->boosted_until > now())
                        <span class="absolute left-4 top-4 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Sponsorisé</span>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="absolute right-4 top-4 w-7 h-7 text-yellow-400 cursor-pointer">
                        <path fill-rule="evenodd" d="M14.615 1.595a.75.75 0 0 1 .359.852L12.982 9.75h7.268a.75.75 0 0 1 .548 1.262l-10.5 11.25a.75.75 0 0 1-1.272-.71l1.992-7.302H3.75a.75.75 0 0 1-.548-1.262l10.5-11.25a.75.75 0 0 1 .913-.143Z" clip-rule="evenodd" />
                        </svg>
                    @endif
                    <img src="/storage/{{ $product->image }}" alt="{{ $product->title }}" class="w-full max-w-md h-auto" >
                </div>

                {{-- Détails à droite --}}
                <div class="flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->title }}</h1>
                        <p class="text-sm text-gray-400 mb-4"> Ajouté le <span class="text-gray-300">{{$product->created_at->format('d-m-Y') }}</span> par <a href="{{ route('shop.show', $product->shop) }}"><span class="text-blue-500 hover:underline underline-offset-2 pointer">{{ $product->shop->name }}</a></span></p>
                        <div class="mb-4">
                            <div class="inline-flex items-center gap-2 text-blue-800 px-4 py-2 rounded-xl shadow-inner text-xl font-extrabold tracking-wide hover:bg-gradient-to-r from-blue-500 to-blue-700 hover:text-white transition duration-150 cursor-pointer">
                                {{-- Icône de prix --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>

                                {{ number_format($product->price, 0, ',', ' ') }} Ar
                            </div>
                        </div>
                        <div class="mb-4">
                            @if ($product->quantity > 0)
                                    <span class="text-green-600 font-bold">{{ $product->quantity }} en stock</span>
                            @else
                                    <span class="text-red-600 font-bold">Rupture de stock</span>
                            @endif
                        </div>
                        <p class="text-md text-gray-600 mt-2 font-bold mb-1">Catégorie :</p>
                            @foreach ($product->categories as $category)
                                <a href="{{ route('category.show', $category) }}"><span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-semibold mr-1 mb-1">{{ $category->title }}</span></a>
                            @endforeach

                        <p class="text-md text-gray-600 mt-2 font-bold mb-1">Déscription :</p>
                        <p class="text-gray-500 mb-2">{{ $product->description }}</p>



                        {{-- Note moyenne --}}
                        <div class="mt-4 flex items-center space-x-1">
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
                            <span class="text-sm text-gray-500">({{ $product->ratings->count() }} avis)</span>
                        </div>
                    </div>

                    {{-- Bouton acheter --}}
                    <div class="mt-6">
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

            {{-- Section Avis --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="w-full mt-10 bg-white p-6 rounded-2xl shadow-md">
                    <h2 class="flex justify-between items-center text-2xl font-semibold text-gray-800 mb-4">Avis des clients
                        <span class="text-sm text-gray-500">({{ $product->ratings->count() }} avis)</span>
                    </h2>
                    <x-success />
                    @forelse ($product->ratings as $rating)
                        <div class="mb-2 border-b pb-1">
                            <div class="flex items-center justify-between">
                                <span class="text-md font-bold text-gray-700">{{ $rating->user->name }}</span>
                                <div class="flex items-center space-x-1">
                                    @for ($i = 1; $i<= $rating->rating; $i++  )
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                        </svg>
                                    @endfor
                                    @for ($i = $rating->rating; $i< 5; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                    @endfor

                                </div>
                            </div>
                            <p class="text-sm text-gray-500">{{ $rating->created_at->diffForHumans()}}</p>
                            <p class="mt-2 px-2 text-gray-700">{{ $rating->comment }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucun avis pour ce produit pour le moment.</p>
                    @endforelse
                </div>

                {{-- Formulaire de commentaire (pour client uniquement) --}}
                @role('customer')
                <div class="mt-10 bg-gray-50 p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Laissez votre avis</h3>
                    <form action="{{ route('ratings.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div>
                            {{-- @if (@session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif --}}
                            <x-error />
                            <label class="block text-gray-600 mb-2 font-semibold">Votre note</label>
                            <x-error-input name="rating" />

                            <div x-data="{ rating: 0 }" class="flex gap-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    <label>
                                        <input type="radio" name="rating" value="{{ $i }}" class="hidden" x-model="rating">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            :class="rating >= {{ $i }} ? 'text-yellow-400' : 'text-gray-300'"
                                            class="w-8 h-8 cursor-pointer transition-colors duration-200"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.97a1 1 0 00.95.69h4.175c.969
                                            0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.286
                                            3.97c.3.921-.755 1.688-1.538 1.118L10
                                            14.347l-3.38 2.455c-.783.57-1.838-.197-1.538-1.118l1.286-3.97a1
                                            1 0 00-.364-1.118L2.624
                                            9.397c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0
                                            00.95-.69l1.286-3.97z"/>
                                        </svg>
                                    </label>
                                @endfor
                            </div>


                        <div>
                            <label for="comment" class="block text-gray-600 mb-1">Commentaire</label>
                            <textarea name="comment" id="comment" rows="3" class="w-full border rounded-lg p-2" placeholder="Votre commentaire (facultatif)"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                            Envoyer
                        </button>
                    </form>
                </div>
                @endrole
            </div>
        </div>
    </div>
    </div>

</x-layout>


