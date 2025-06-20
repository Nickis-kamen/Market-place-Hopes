<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture Commande #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #1f2937;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #1e40af;
            padding-bottom: 10px;
        }
        .logo {
            height: 50px;
        }
        h2 {
            color: #1e40af;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: white;
        }
        th {
            background-color: #1e40af;
            color: white;
            text-align: center;
            padding: 8px;
        }
        td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .total {
            margin-top: 30px;
            font-weight: bold;
            font-size: 16px;
            color: #111827;
        }
        .details p {
            margin: 4px 0;
        }
        .titre{
            margin-left: 2px;
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    @php
        $status = [
            'en attente' => 'En attente',
            'paid' => 'Payé',
            'unpaid' => 'Non payé',
        ];
    @endphp

    <div class="header">
        {{-- Logo du site --}}
        <div class="flex">
            <img src="{{ public_path('images/icons.png') }}" alt="Logo" class="logo">
            <p class="titre">MarketPlace</p>
        </div>
        <div>
            <h2>Facture - Commande #{{ $order->id }}</h2>
        </div>
    </div>

    <div class="details">
        <p><strong>Statut :</strong> {{ $status[$order->status] }}</p>
        <p><strong>Date :</strong> {{ $order->created_at->format('d/m/Y à H:i') }}</p>
        <p><strong>Client :</strong> {{ $order->user->name }}</p>
        <p><strong>Vendeur :</strong> {{ $order->vendor->name }}</p>
    </div>

    <h4>Produits commandés :</h4>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
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
