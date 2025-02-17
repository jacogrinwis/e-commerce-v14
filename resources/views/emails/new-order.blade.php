<div>
    <h1>Nieuwe bestelling ontvangen</h1>

    <p>Bestelnummer: #{{ $order->order_number }}</p>
    <p>Klant: {{ $order->user?->name ?? $order->shipping_address['name'] }}</p>
    <p>Email: {{ $order->user?->email ?? $order->shipping_address['email'] }}</p>
    <p>Totaalbedrag: {{ formatPrice($order->total_amount) }}</p>

    <h2>Bestelde producten:</h2>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->quantity }}x {{ $item->product->name }} - {{ formatPrice($item->price * $item->quantity) }}
            </li>
        @endforeach
    </ul>
</div>
