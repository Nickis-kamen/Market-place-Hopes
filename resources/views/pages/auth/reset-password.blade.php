<x-layout-login title="Réinitialiser le mot de passe">
    <div class="mb-15 mt-25">
        <h2 class="text-center text-xl font-bold mb-6">Réinitialisation</h2>

        <form method="POST" action="{{ route('password.update') }}" class="my-2 max-w-sm mx-auto p-8 bg-white rounded-lg shadow-md">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1">Nouveau mot de passe</label>
                <input type="password" name="password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block mb-1">Confirmer mot de passe</label>
                <input type="password" name="password_confirmation" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Réinitialiser</button>
        </form>
    </div>
</x-layout-login>
