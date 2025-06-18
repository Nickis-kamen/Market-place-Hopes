<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouvelle commande</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <table width="100%" style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <tr>
            <td>
                <h1 style="color: #333;">Bonjour {{ $order->vendor->name }},</h1>
                <p style="font-size: 16px; color: #555;">
                    Vous avez reçu une <strong>nouvelle commande</strong> de <strong>{{ $order->user->name }}</strong>.
                </p>

                <p style="font-size: 16px; color: #555;">
                    <strong>Montant total :</strong> 
                    <span style="color: #27ae60; font-weight: bold;">
                        {{ number_format($order->total_amount, 0, ',', ' ') }} Ar
                    </span>
                </p>

                <hr style="margin: 20px 0;">

                <h3 style="color: #333;">Détails des produits :</h3>
                <ul style="font-size: 15px; color: #555; padding-left: 20px;">
                    @foreach ($order->items as $item)
                        <li>
                            {{ $item->product->title }} 
                            <span style="color: #999;">(x{{ $item->quantity }})</span> – 
                            <strong>{{ number_format($item->price, 0, ',', ' ') }} Ar</strong>
                        </li>
                    @endforeach
                </ul>

                <p style="font-size: 16px; color: #555; margin-top: 30px;">
                    Merci de <strong>traiter cette commande</strong> dès que possible.
                </p>

                <p style="font-size: 14px; color: #999; margin-top: 30px;">
                    — Votre équipe Marketplace
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
