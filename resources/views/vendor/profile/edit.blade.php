<x-vendor.layout-vendor title="Modifier mes informations">
    <main class="py-10 px-8 md:ml-64 min-h-screen bg-gray-100 mt-18">
        <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-xl shadow">
            <h2 class="text-2xl font-bold mb-6 text-gray-700 text-center">Modifier mes informations</h2>

            <x-error />
            <x-success />

            <form action="{{ route('vendor.update-info') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Image de profil --}}
                {{-- <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Photo de profil</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:border file:border-gray-300 file:rounded file:p-1 file:bg-gray-100">

                    @if($user->image)
                        <img src="/storage/{{ $user->image }}" alt="photo" class="mt-2 w-20 h-20 rounded-full object-cover border shadow">
                    @endif
                </div> --}}
                <div class="relative w-32 h-32 mx-auto mb-6">
                    <!-- Image visible -->
                    <img id="preview"
                        src="{{ asset('storage/'.$user->image) }}"
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
                <x-error-input name="image" />
                {{-- Nom --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <x-error-input name="name" />
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Prénom --}}
                <div class="mb-4">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                    <x-error-input name="first_name" />
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Date de naissance --}}
                <div class="mb-4">
                    <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de naissance</label>
                    <x-error-input name="date_naissance" />
                    <input type="date" name="date_naissance" id="date_naissance" value="{{ old('date_naissance', $user->date_naissance->format('Y-m-d')) }}"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Téléphone --}}
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <x-error-input name="phone" />
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
                </div>

                {{-- Adresse --}}
                <div class="mb-6">
                    <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                    <x-error-input name="address" />
                    <textarea name="address" id="address" rows="3"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('address', $user->address) }}</textarea>
                </div>

                <button type="submit" class="cursor-pointer bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Enregistrer les modifications
                </button>
            </form>
        </div>
    </main>
</x-vendor.layout-vendor>
