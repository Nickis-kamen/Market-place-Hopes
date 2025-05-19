<x-admin.layout-admin title="Commandes">
    {{-- <x-sidebar-vendor /> --}}
        {{-- Contenu principal --}}
        <div class="py-10 px-8 sm:ml-64 h-screen mt-15">
            <h1 class="text-2xl font-bold mb-4">Liste des commandes</h1>

            {{-- @if($orders->isEmpty()) --}}
                <p>Aucune commande pour l’instant.</p>
            {{-- @else --}}
                <table class="w-full border border-gray-200 shadow-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2">ID</th>
                            <th class="p-2">Client</th>
                            <th class="p-2">Produit</th>
                            <th class="p-2">Quantité</th>
                            <th class="p-2">Total</th>
                            <th class="p-2">Statut</th>
                            <th class="p-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($orders as $order) --}}
                            <tr class="border-t">
                                <td class="p-2">1</td>
                                <td class="p-2">nom</td>
                                <td class="p-2">produit</td>
                                <td class="p-2">3</td>
                                <td class="p-2">2020 Ar</td>
                                <td class="p-2">
                                    <span class="text-green-500">En cours</span>
                                    {{-- <span class="text-red-500">Annulé</span> --}}
                                    {{-- <span class="text-blue-500">Expédié</span> --}}
                                </td>
                                <td class="p-2">12/12/25</td>
                            </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            {{-- @endif --}}
        </div>

</x-admin.layout-admin>
