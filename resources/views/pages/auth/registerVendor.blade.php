
<x-layout title='Inscription'>
    <h2 class="text-gray-700 text-center mt-20 p-5 text-4xl font-bold" >Inscription Vendeur</h2>

    <form action="{{ route('auth.register.vendor') }}" class="my-2 max-w-sm mx-auto p-8 bg-white rounded-lg shadow-md" method="POST">
        @csrf
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15 mx-auto mb-5 text-blue-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
          </svg>

        <div class="mb-5">
          <label for="nom" class="block mb-2 text-sm font-medium text-gray-900">Nom</label>
          <x-error-input name="name"/>
          <input type="text" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  name="name" />
        </div>
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mail</label>
          <x-error-input name="email"/>
          <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="nom@entreprise.com" name="email" />
        </div>
        <div class="mb-5">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Téléphone</label>
            <x-error-input name="phone"/>
            <input type="text" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  name="phone" />
          </div>
          <div class="mb-5">
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Adresse</label>
            <x-error-input name="address"/>
            <input type="text" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  name="address" />
          </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
            <x-error-input name="password"/>
          <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="password" />
        </div>
        <div class="mb-5">
          <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirmer le mot de passe</label>
          <input type="password" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="password_confirmation" />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Valider</button>

    </form>

    </x-layout>
