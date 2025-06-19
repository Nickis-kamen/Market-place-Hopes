<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Commande #{{ $order->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .header { margin-bottom: 20px; }
        .total { margin-top: 30px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        tr{text-align: center;}
    </style>
</head>
<body>
    @php
        $status =[
            'en attente' => 'en attente',
            'paid' => 'payé',
            'unpaid' => 'non payé',
        ];

    @endphp
    <h2>Commande #{{ $order->id }}</h2>
    <p><strong>Statut :</strong> {{ $status[$order->status] }}</p>
    <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
    <p><strong>Client :</strong> {{ $order->user->name }}</p>
    <p><strong>Vendeur :</strong> {{ $order->vendor->name }}</p>

    <h4>Produits :</h4>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', ' ') }} Ar</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} Ar</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Montant total : {{ number_format($order->total_amount, 0, ',', ' ') }} Ar</p>
</body>
</html>
