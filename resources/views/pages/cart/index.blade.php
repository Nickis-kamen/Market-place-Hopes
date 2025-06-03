<x-layout title="Panier">
    <x-sidebar-other :user="$user" />

    <section class="p-4 sm:ml-64 bg-gradient-to-b from-indigo-100 to-[#D6D2FF] mt-18 min-h-screen">
        <div class="max-w-6xl mx-auto mt-10 px-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">🛒 Votre panier</h2>
            <x-success />
            <x-error />
            @if(session('cart') && count(session('cart')) > 0)
                @php $total = 0; @endphp

                <div class="overflow-x-auto bg-white rounded-lg shadow-sm">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                            <tr>
                                <th class="p-4 text-left">Image</th>
                                <th class="p-4 text-left">Produit</th>
                                <th class="p-4 text-center">Quantité</th>
                                <th class="p-4 text-right">Prix unitaire</th>
                                <th class="p-4 text-right">Total</th>
                                <th class="p-4 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('cart') as $id => $item)
                                @php $total += $item['price'] * $item['quantity']; @endphp
                                <tr class=" hover:bg-gray-50">
                                    <td class="p-4">
                                        <a href="{{ route('product.show',$item['product']) }}">
                                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" class="w-20 h-20 rounded object-cover">
                                        </a>
                                    </td>
                                    <td class="p-4 font-medium text-gray-700"><a href="{{ route('product.show',$item['product']) }}">{{ $item['title'] }}</a></td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('cart.update', $id)  }}" method="POST" class="inline-flex items-center gap-2">
                                            @csrf
                                            {{-- @method('PUT') --}}
                                            <button type="submit" name="action" value="decrease" class="{{ $item['quantity']<=1 ? 'bg-gray-100 cursor-not-allowed' : 'cursor-pointer bg-gray-200 hover:bg-gray-300'}} px-2 py-1 rounded" {{ $item['quantity']<=1 ? 'disabled' : '' }}>−</button>
                                            <span class="px-2 text-sm">{{ $item['quantity'] }}</span>
                                            <button type="submit" name="action" value="increase" class="cursor-pointer px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                        </form>
                                    </td>
                                    <td class="p-4 text-right text-gray-600">{{ number_format($item['price'], 0, ',', ' ') }} Ar</td>
                                    <td class="p-4 text-right font-semibold text-gray-800">{{ number_format($item['price'] * $item['quantity'], 0, ',', ' ') }} Ar</td>
                                    <td class="p-4 text-center">
                                        <form action="{{ route('cart.remove',$id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="cursor-pointer text-red-500 hover:text-red-700 text-sm">🗑 Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-t border-t-gray-300 bg-gray-50">
                                <td colspan="5" class="p-4 font-bold text-lg text-gray-800">Total à payer :</td>
                                <td colspan="1" class="p-4 text-center font-bold text-lg text-blue-700">{{ number_format($total, 0, ',', ' ') }} Ar</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="text-right mt-6">
                    <a href="{{ route('checkout') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">Passer la commande</a>
                </div>
            @else
                <div class="text-center py-24 text-gray-600">
                    <svg class="mx-auto mb-4 w-16 h-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M3 3h2l.4 2M7 13h14l-1.35 6.75a1 1 0 01-.98.75H8.3a1 1 0 01-.98-.8L5 4H3"></path>
                    </svg>
                    <p class="text-xl mb-2">Votre panier est vide</p>
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline">← Retour à la boutique</a>
                </div>
            @endif
        </div>
    </section>
</x-layout>
