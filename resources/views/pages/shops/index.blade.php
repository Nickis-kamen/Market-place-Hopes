<x-layout title="Boutiques">
    <x-sidebar-other :user="$user"/>

    <section class="p-4 md:ml-64 bg-gradient-to-b from-indigo-100 to-[#D6D2FF] min-h-screen mt-18">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex items-center justify-between mb-12 flex-wrap">

                <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-2 md:mb-0">
                    Découvrez toutes nos <span class="text-indigo-600">boutiques</span>
                </h1>
                <div class="relative left-1/2 -translate-x-1/2 md:left-0 md:translate-x-0">
                    <form action="{{ route('shops.index') }}" method="GET" class="relative">
                        <input type="search" name="search" value="{{ request('search') }}" id="search-dropdown" class="block p-2.5 w-full pr-10 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Recherche" />

                        <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                        >
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Recherche</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse ($shops as $shop)
                    <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl p-6 flex flex-col justify-between hover:bg-blue-500 hover:text-white transition duration-300 ease-in-out hover:scale-105">
                        <a href="{{ route('shop.show', $shop) }}" class="flex flex-col items-center space-y-4">
                            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-indigo-200 shadow-md group-hover:border-white">
                                <img src="/storage/{{ $shop->image }}" alt="boutique" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-xl font-semibold text-center group-hover:text-white">{{ $shop->name }}</h3>
                        </a>
                        <div class="mt-4 flex items-center space-x-1 mx-auto">
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
                        </div>
                        <div class="text-center mt-4 ">
                            <p class="text-sm" id="desc-{{ $shop->id }}">
                                {{ Str::limit($shop->description, 60) }}
                                @if(strlen($shop->description) > 60)
                                    <button
                                        class="text-xs text-blue-700 bg-white px-2 py-1 rounded mt-2 ml-2 font-medium hover:bg-blue-100 transition"
                                        data-full-description="{{ $shop->description }}"
                                        onclick="showFull({{ $shop->id }}, this)">
                                        Lire plus
                                    </button>
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500 text-lg">Aucune boutique trouvée.</p>
                @endforelse
            </div>

            <nav class="mt-8 flex justify-center">
                <ul class="inline-flex items-center space-x-1 text-sm">
                    {{-- Page précédente --}}
                    @if ($shops->onFirstPage())
                        <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                    @else
                        <a href="{{ $shops->previousPageUrl() }}" class="">
                            <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </li>
                        </a>
                    @endif

                    {{-- Liens de page --}}
                    @foreach ($shops->getUrlRange(1, $shops->lastPage()) as $page => $url)
                        <li>
                            @if ($page == $shops->currentPage())
                                <span class="px-3 py-2 bg-blue-600 text-white font-bold rounded-md">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-blue-100">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach

                    {{-- Page suivante --}}
                    @if ($shops->hasMorePages())
                        <a href="{{ $shops->nextPageUrl() }}" class="">
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
        </div>
    </section>
</x-layout>
