<x-layout-login title="Mot de passe oublié">
    <div class="mb-15 mt-25">
        <h2 class="text-center text-xl font-bold mb-8" >Mot de passe oublié</h2>
        <x-success />
        <form method="POST" action="{{ route('password.email') }}" class=" my-2 max-w-sm mx-auto p-8 bg-white rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-4">Votre adresse email</label>
                <input type="email" name="email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Envoyer le lien</button>
        </form>
    </div>
</x-layout-login>
