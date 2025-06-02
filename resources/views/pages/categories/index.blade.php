<x-layout title="Catégories">
    <x-sidebar-other :user="$user"/>

    <section class="p-4 sm:ml-64 bg-gradient-to-b from-indigo-100 to-[#D6D2FF] mt-18 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex items-center justify-between mb-12 flex-wrap">

                <h1 class="text-4xl font-extrabold text-gray-800 text-center">
                    Découvrez toutes nos <span class="text-indigo-600">catégories</span>
                </h1>
                <div class="relative">
                    <form action="{{ route('categories.index') }}" method="GET" class="relative">
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
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-10">
                @forelse ($categories as $category)
                    <div class="group bg-white rounded-3xl shadow-md p-6 flex flex-col items-center hover:bg-indigo-500 hover:text-white transition-all duration-300 ease-in-out hover:scale-[1.03] hover:shadow-xl">
                        <a href="{{ route('category.show', $category) }}" class="flex flex-col items-center">
                            <div class="bg-indigo-100 group-hover:bg-white text-indigo-600 group-hover:text-indigo-500 rounded-full p-4 mb-4 transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                    <path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                    <path d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-center mb-2 group-hover:text-white">{{ $category->title }}</h3>
                        </a>

                        <div class="text-center mt-2">
                            <p class="text-sm text-gray-600 group-hover:text-white" id="desc-{{ $category->id }}">
                                {{ Str::limit($category->description, 60) }}
                                @if(strlen($category->description) > 60)
                                    <button
                                        class="text-xs text-blue-700 bg-white px-2 py-1 rounded mt-2 ml-2 font-medium group-hover:bg-white hover:bg-blue-100 transition"
                                        data-full-description="{{ $category->description }}"
                                        onclick="showFull({{ $category->id }}, this)">
                                        Lire plus
                                    </button>
                                @endif
                            </p>
                        </div>
                    </div>
                    @empty
                    <p class="col-span-full text-center text-gray-500 text-lg">Aucune catégorie trouvée.</p>
                    @endforelse
                </div>
                <nav class="mt-8 flex justify-center">
                    <ul class="inline-flex items-center space-x-1 text-sm">
                        {{-- Page précédente --}}
                        @if ($categories->onFirstPage())
                            <li class="px-3 py-2 bg-gray-200 text-gray-400 rounded-md cursor-not-allowed">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </li>
                        @else
                            <a href="{{ $categories->previousPageUrl() }}" class="">
                                <li class="px-3 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </li>
                            </a>
                        @endif

                        {{-- Liens de page --}}
                        @foreach ($categories->getUrlRange(1, $categories->lastPage()) as $page => $url)
                            <li>
                                @if ($page == $categories->currentPage())
                                    <span class="px-3 py-2 bg-blue-600 text-white font-bold rounded-md">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="px-3 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-blue-100">{{ $page }}</a>
                                @endif
                            </li>
                        @endforeach

                        {{-- Page suivante --}}
                        @if ($categories->hasMorePages())
                            <a href="{{ $categories->nextPageUrl() }}" class="">
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
