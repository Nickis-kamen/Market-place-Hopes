{{-- resources/views/customer/account.blade.php --}}
<x-layout title="Mon Compte">
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold mb-6">Mon Compte</h1>

        {{-- Section Profil --}}
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Informations personnelles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-gray-700 font-medium">Nom :</p>
                    <p class="text-gray-800">{{ Auth::user()->name }}</p>
                </div>
                <div>
                    <p class="text-gray-700 font-medium">E-mail :</p>
                    <p class="text-gray-800">{{ Auth::user()->email }}</p>
                </div>
                <div>
                    <p class="text-gray-700 font-medium">Téléphone :</p>
                    <p class="text-gray-800">{{ Auth::user()->phone }}</p>
                </div>
                <div>
                    <p class="text-gray-700 font-medium">Adresse :</p>
                    <p class="text-gray-800">{{ Auth::user()->address }}</p>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href=""
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Modifier mes informations
                </a>
                <form action="{{ route('logout.store') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Déconnexion
                    </button>
                </form>
            </div>
        </div>

        {{-- Section Commandes récentes --}}
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Mes commandes récentes</h2>

            {{-- @if($orders->isEmpty()) --}}
                <p class="text-gray-600">Vous n'avez encore passé aucune commande.</p>
            {{-- @else --}}
                <div class="space-y-4">
                    {{-- @foreach($orders as $order) --}}
                        <div class="border rounded-lg p-4 hover:shadow">
                            <div class="flex justify-between items-center mb-2">
                                <div>
                                    <p class="font-medium">Commande # 1</p>
                                    <p class="text-sm text-gray-500">Le 20/20/25</p>
                                </div>
                                {{-- <span class="px-3 py-1 rounded-full text-sm
                                    {{ $order->status === 'en cours' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                    {{ $order->status === 'livrée' ? 'bg-green-100 text-green-700' : '' }}
                                    {{ $order->status === 'annulée' ? 'bg-red-100 text-red-700' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span> --}}
                                <span class="px-3 py-1 rounded-full text-sm 'bg-yellow-100 text-yellow-700"> en cours </span>
                            </div>
                            <div class="text-gray-700">
                                {{-- <p><span class="font-medium">Total :</span> {{ number_format($order->total, 0, ',', ' ') }} Ar</p> --}}
                                <p><span class="font-medium">Total :</span> 20000 Ar</p>
                                <a href=""
                                   class="text-blue-600 hover:underline text-sm">
                                    Voir le détail
                                </a>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                </div>
            {{-- @endif --}}
        </div>
    </div>
</x-layout>
