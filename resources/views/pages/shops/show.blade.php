<x-layout title="Détails de la boutique">

    <x-sidebar-other :user="$user"/>

    {{-- Contenu principal --}}
    <div  class=" py-10 sm:ml-64 mt-20 pb-65">
        {{-- Détails du produit --}}
        <div class="max-w-6xl mx-auto px-4">
    {{-- Grille image + infos --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 rounded-2xl shadow-lg">

                {{-- Image produit à gauche --}}
                <div class="bg-cover rounded-2xl">
                    <img src="/storage/{{ $shop->image }}" alt="{{ $shop->name }}" class="w-full max-w-md h-auto rounded-xl shadow-md bg-cover bg-no-repeat" style="background-image: url('{{ asset('images/wave.svg') }}');">
                </div>

                {{-- Détails à droite --}}
                <div class="flex flex-col justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $shop->name }}</h1>
                        <p class="text-gray-600 mb-4">Boutique de <span class="text-blue-500">{{ $vendor->name }}</span></p>

                        <p class="flex items-center gap-1 text-sm text-gray-600 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            {{ $shop->adresse }}</p>
                        <p class="text-md text-gray-600 mt-2 font-bold mb-1">Déscription :</p>
                        <p class="text-gray-500 mb-2">{{ $shop->description }}</p>



                        {{-- Note moyenne --}}
                        <div class="mt-4 flex items-center space-x-1">
                            @for ($i = 1; $i<= $shop->averageRating(); $i++  )
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                </svg>
                            @endfor
                            @for ($i = $shop->averageRating(); $i< 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-5 h-5 text-yellow-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                </svg>
                            @endfor
                            <span class="text-sm text-gray-500">({{ $shop->ratings->count() }} avis)</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Section Avis --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="w-full mt-10 bg-white p-6 rounded-2xl shadow-md">
                    <h2 class="flex justify-between items-center text-2xl font-semibold text-gray-800 mb-4">Avis des clients
                        <span class="text-sm text-gray-500">({{ $shop->ratings->count() }} avis)</span>
                    </h2>
                    <x-success />
                    @forelse ($shop->ratings as $rating)
                        <div class="mb-4 border-b pb-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-700">{{ $rating->user->name }}</span>
                                <div class="mt-4 flex items-center space-x-1">
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
                            <p class="text-sm text-gray-500">{{ $rating->created_at->format('d/m/Y') }}</p>
                            <p class="mt-2 text-gray-700">{{ $rating->comment }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Aucun avis pour cette boutique pour le moment.</p>
                    @endforelse
                </div>

                {{-- Formulaire de commentaire (pour client uniquement) --}}
                @role('customer')
                <div class="mt-10 bg-gray-50 p-6 rounded-xl shadow">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Laissez votre avis</h3>
                    <form action="{{ route('ratingsShop.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                        <div>
                            @if (@session('error'))
                                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif
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

</x-layout>


