<x-vendor.layout-vendor title="Ma Boutique">
    {{-- <x-sidebar-vendor /> --}}
    <div class="py-10 sm:ml-64 h-screen mt-15 pb-65">
        @if($shop)
        <!-- Affichage des détails de la boutique -->
        <div class="bg-white shadow-md rounded-xl py-10 px-15 w-125 mx-auto">
            <div class="mb-5 text-center">
                <x-success />
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations de la boutique</h2>
                <div class="w-32 h-32 mx-auto mb-6">
                    <img src="{{ asset('storage/'. $shop->image) }}" alt="Logo de la boutique" class="w-full h-full object-cover rounded-full">
                </div>
                <p class="mb-4"><strong>Nom : </strong>{{ $shop->name }}</p>
                <p class="mb-4"><strong>Description : </strong>{{ $shop->description }}</p>
                <p><strong>Date de création : </strong>{{ $shop->created_at->translatedFormat('d M Y') }}</p>
            </div>
            <a href="{{ route('vendor.shop.edit', $shop->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full text-center">
                Modifier
            </a>
        </div>
        @else
        <!-- Formulaire de création de boutique -->
        <div class="bg-white shadow-md rounded-xl py-10 px-15 w-150 mx-auto mb-5">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Créer votre boutique</h2>

            <form action="{{ route('vendor.shop.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="mb-4 text-center">
                    <label for="fileInput" class="block text-gray-700 mb-4">Logo</label>
                    <x-error-input name="image" />
                    <img id="preview" src="{{ asset('images/shop_default.jpg') }}" alt="Prévisualisation" class="w-30 h-30  object-cover rounded-full mb-4 mx-auto" />

                    <input type="file" name="image" id="fileInput" accept="image/*" class="mt-1 p-2 rounded" />

                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nom</label>
                    <x-error-input name="name" />
                    <input type="text" id="name" name="name"
                    class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="descri" class="block text-gray-700">Déscription</label>
                    <x-error-input name="description" />
                    <textarea name="description" id="descri" rows="5"
                        class="w-full mt-1 p-2 border border-gray-300 rounded"></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Créer</button>
            </form>
        </div>
    @endif
    </div>


</x-vendor.layout-vendor>

