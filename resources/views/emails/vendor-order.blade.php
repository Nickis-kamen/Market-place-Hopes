<h1>Bonjour {{ $order->vendor->name }}</h1>

<p>Vous avez reçu une nouvelle commande de {{ $order->user->name }}.</p>

<p>Montant total : {{ number_format($order->total_amount, 0, ',', ' ') }} Ar</p>

<p>Détails des produits :</p>
<ul>
@foreach ($order->items as $item)
    <li>{{ $item->product->title }} (x{{ $item->quantity }}) - {{ number_format($item->price, 0, ',', ' ') }} Ar</li>
@endforeach
</ul>

<p>Merci de traiter cette commande dès que possible.</p>
