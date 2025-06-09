<x-vendor.layout-vendor title="Modifier">
<div class="py-5 sm:ml-64 h-screen mt-18">
    <div class="bg-white shadow-md rounded-xl py-10 px-15 w-150 mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Modifier la produit</h2>

            <form action="{{ route('vendor.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <!-- Image visible -->
                    <img id="preview"
                        src="{{ asset('storage/'.$product->image) }}"
                        alt="Image actuelle"
                        class="w-full h-full object-cover rounded-full border">

                    <!-- Icône cliquable -->
                    <label for="fileInput"
                        class="absolute top-0 right-0 bg-white rounded-full p-1 shadow cursor-pointer hover:bg-gray-100">
                        <!-- Icône (FontAwesome ou SVG ici) -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>

                    </label>

                    <!-- Input caché -->
                    <input type="file" id="fileInput" name="image" class="hidden" accept="image/*"/>
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Nom</label>
                    <x-error-input name="title"/>
                    <input type="text" id="title" name="title" value="{{ $product->title }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Prix</label>
                    <x-error-input name="price"/>
                    <input type="text" id="price" name="price" value="{{ $product->price }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="descri" class="block text-gray-700">Déscription</label>
                    <x-error-input name="description" />
                    <textarea name="description" id="descri" rows="5"
                    class="w-full mt-1 p-2 border border-gray-300 rounded">{{ $product->description }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Catégories</label>
                    <x-error-input name="categories" />
                    @if ($categories->isEmpty())
                        <p class="text-gray-500">Aucune catégorie disponible.</p>
                    @else
                    <div class="flex flex-wrap gap-4">
                        @foreach ($categoriesAll as $category)
                            <div class="flex items-center">
                                <input type="checkbox"
                                    id="category-{{ $category->id }}"
                                    name="categories[]"
                                    value="{{ $category->id }}"
                                    class="peer hidden"
                                    {{ $product->categories->contains($category->id) ? 'checked' : '' }} />

                                <label for="category-{{ $category->id }}"
                                    class="cursor-pointer rounded-lg border px-3 py-1 text-gray-700 transition-colors duration-200 peer-checked:bg-blue-600 peer-checked:text-white">
                                    {{ $category->title }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-semibold">Quantité</label>
                    <x-error-input name="qty" />
                    <input type="number" step="0.01" name="quantity" id="qty" class="w-full border p-2 rounded" value="{{ $product->quantity }}">
                </div>
                <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Valider</button>
            </form>
    </div>
</div>
</x-vendor.layout-vendor>
