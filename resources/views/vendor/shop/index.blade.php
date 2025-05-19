<x-vendor.layout-vendor title="Ma Boutique">
    {{-- <x-sidebar-vendor /> --}}
    <div class="py-10 sm:ml-64 h-screen mt-15">
        {{-- @if($shop) --}}
        <!-- Affichage des détails de la boutique -->
        {{-- <div class="bg-white shadow-md rounded-xl py-10 px-15 w-125 mx-auto">
            <div class="mb-5 text-center">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informations de la boutique</h2>
                <img src="https://i.pinimg.com/736x/12/3d/e6/123de6cba6e853578c176ba55d56a948.jpg" alt="Logo de la boutique" class="w-32 h-32 rounded-full mb-4 mx-auto">
                <p class="mb-4"><strong>Nom : </strong> zzzzzzzzzzzzzzz</p>
                <p class="mb-4"><strong>Description : </strong> zzzzzzzzzzzzz</p>
                <p><strong>Date de création : </strong>zzzzzzzzzz </p>
            </div>
            <a href="" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition w-full text-center">
                Modifier
            </a>
        </div> --}}
        {{-- @else --}}
        <!-- Formulaire de création de boutique -->
        <div class="bg-white shadow-md rounded-xl py-10 px-15 w-200 mx-auto ">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Créer votre boutique</h2>

            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="logo" class="block text-gray-700">Logo</label>
                    <input type="file" id="logo" name="logo"
                        class="mt-1 p-2 rounded" />
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nom</label>
                    <input type="text" id="name" name="name"
                        class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>
                <div class="mb-4">
                    <label for="descri" class="block text-gray-700">Déscription</label>
                    <input type="text" id="descri" name="description"
                        class="w-full mt-1 p-2 border border-gray-300 rounded" />
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Créer</button>
            </form>
        </div>
    {{-- @endif --}}
    </div>


</x-vendor.layout-vendor>

