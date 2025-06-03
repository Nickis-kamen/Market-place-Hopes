
<x-layout title='Connexion'>
<h2 class="text-gray-700 text-center mt-20 p-5 text-4xl font-bold" >Connexion</h2>

<form action="{{ route('auth.login') }}" method="POST" class="my-2 max-w-sm mx-auto p-8 bg-white rounded-lg shadow-md">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-15 mx-auto mb-5 text-blue-500">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
    </svg>
    @csrf
    <div class="mb-5">
    <x-success />
    <x-error />
    {{-- @dd(session('error')); --}}
    <x-error-input name="verification"/>
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Votre email</label>
      <x-error-input name="email"/>
      <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="nom@entreprise.com" name="email"/>
    </div>
    <div class="mb-5">
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Votre mot de passe</label>
        <x-error-input name="password"/>
      <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" name="password"/>
    </div>
    <div class="flex items-start mb-5">
        <a href="" class="text-sm text-blue-800 hover:underline">Mot de passe oublié</a>
    </div>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Connexion</button>
</form>

</x-layout>
