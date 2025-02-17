{{-- <div>
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
</div> --}}


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
</head>

<body style="margin: 0; padding: 0; background-color: #f3f4f6;">
    <div style="max-width: 600px; margin: 0 auto; padding: 32px; background-color: white;">
        <h1 style="font-size: 24px; font-weight: bold; margin-bottom: 24px;">Nieuwe bestelling ontvangen</h1>

        <div style="margin-bottom: 16px;">
            <p style="color: #4b5563; margin: 8px 0;">Bestelnummer: #{{ $order->order_number }}</p>
            <p style="color: #4b5563; margin: 8px 0;">Klantnummer:
                {{ $order->user?->id ?? $order->shipping_address['id'] }}</p>
            <p style="color: #4b5563; margin: 8px 0;">Klant:
                {{ $order->user?->name ?? $order->shipping_address['name'] }}</p>
            <p style="color: #4b5563; margin: 8px 0;">Email:
                {{ $order->user?->email ?? $order->shipping_address['email'] }}</p>
            <p style="color: #4b5563; margin: 8px 0;">Adres:</p>
            <p style="color: #4b5563; margin: 8px 0;">{{ $order->user?->street ?? $order->shipping_address['street'] }}
                {{ $order->user?->house_number ?? $order->shipping_address['house_number'] }}</p>
            <p style="color: #4b5563; margin: 8px 0;">
                {{ $order->user?->postal_code ?? $order->shipping_address['postal_code'] }}
                {{ $order->user?->city ?? $order->shipping_address['city'] }}</p>
            <p style="color: #4b5563; margin: 8px 0;">
                {{ $order->user?->country ?? $order->shipping_address['country'] }}</p>
            <p
                style="color: #4b5563; margin: 8px 0;"
                style="font-weight: bold; margin: 8px 0;"
            >Totaalbedrag: {{ formatPrice($order->total_amount) }}</p>
        </div>

        <h2 style="font-size: 20px; font-weight: 600; margin: 32px 0 16px;">Bestelde producten:</h2>
        <div style="border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
            @foreach ($order->orderItems as $item)
                <div style="padding: 16px; border-bottom: 1px solid #e5e7eb;">
                    <div style="display: flex; justify-content: space-between;">
                        <span>{{ $item->quantity }}x {{ $item->product->name }}</span>
                        <span style="font-weight: 500;">{{ formatPrice($item->price * $item->quantity) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
