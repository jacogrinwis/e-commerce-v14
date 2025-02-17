<div>
    <h1>Nieuwe bestelling ontvangen</h1>

    <p>Bestelnummer: #{{ $order->order_number }}</p>
    <p>Klant nr.: {{ $order->user?->id ?? $order->shipping_address['id'] }}</p>
    <p>Naam: {{ $order->user?->name ?? $order->shipping_address['name'] }}</p>
    <p>Email: {{ $order->user?->email ?? $order->shipping_address['email'] }}</p>
    <p>Telefoon: {{ $order->user?->phone ?? $order->shipping_address['phone'] }}</p>
    <p>Huisnummer: {{ $order->user?->house_number ?? $order->shipping_address['house_number'] }}</p>
    <p>Postcode: {{ $order->user?->postal_code ?? $order->shipping_address['postal_code'] }}</p>
    <p>Plaatsnaam: {{ $order->user?->city ?? $order->shipping_address['city'] }}</p>
    <p>Land: {{ $order->user?->country ?? $order->shipping_address['country'] }}</p>
    <p>Totaalbedrag: {{ formatPrice($order->total_amount) }}</p>

    <h2>Bestelde producten:</h2>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->quantity }}x {{ $item->product->name }} - {{ formatPrice($item->price * $item->quantity) }}
            </li>
        @endforeach
    </ul>
</div>
