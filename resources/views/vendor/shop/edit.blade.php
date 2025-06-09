<x-vendor.layout-vendor title="Modifier">
<div class="py-10 sm:ml-64 h-screen mt-15 pb-65">
    <div class="bg-white shadow-md rounded-xl py-10 px-15 w-150 mx-auto mb-5">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Modifier votre boutique</h2>

            <form action="{{ route('vendor.shop.update', $shop) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <div class="mb-4 text-center">
                    <label for="fileInput" class="block text-gray-700 mb-4">Logo</label>
                    <x-error-input name="image" />
                    <img id="preview" src="#" alt="Prévisualisation" class="w-30 h-30  object-cover rounded-full mb-4 hidden mx-auto" />

                    <input type="file" name="image" id="fileInput" accept="image/*" class="mt-1 p-2 rounded" />

                </div> --}}
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <!-- Image visible -->
                    <img id="preview"
                        src="{{ asset('storage/'.$shop->image) }}"
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
                    <label for="name" class="block text-gray-700">Nom</label>
                    <x-error-input name="name"/>
                    <input type="text" id="name" name="name" value="{{ $shop->name }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="adresse" class="block text-gray-700">Adresse</label>
                    <x-error-input name="adresse"/>
                    <input type="text" id="adresse" name="adresse" value="{{ $shop->adresse }}"
                    class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="descri" class="block text-gray-700">Déscription</label>
                    <x-error-input name="description" />
                    <textarea name="description" id="descri" rows="5"
                    class="w-full mt-1 p-2 border border-gray-300 rounded">{{ $shop->description }}</textarea>
                </div>

                <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Valider</button>
            </form>
    </div>
</div>
</x-vendor.layout-vendor>
