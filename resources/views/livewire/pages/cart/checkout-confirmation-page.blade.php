<div class="container">
    <div class="mx-auto max-w-3xl text-center">
        <h1 class="mb-4 text-3xl font-bold">Bedankt voor je bestelling!</h1>
        <p class="mb-8 text-gray-600">Je bestelnummer is: #{{ $order->order_number }}</p>

        <div class="rounded-lg border border-gray-200 bg-white p-6 text-left">
            <h2 class="mb-4 text-xl font-semibold">Besteloverzicht</h2>

            @foreach ($order->orderItems as $item)
                <div class="flex items-center gap-4 border-b border-gray-200 py-4 last:border-0">
                    <img
                        src="{{ asset($item->product->cover) }}"
                        alt="{{ $item->product->name }}"
                        class="h-16 w-16 rounded-md object-cover"
                    >
                    <div class="flex-1">
                        <h3 class="font-medium">{{ $item->product->name }}</h3>
                        <p class="text-sm text-gray-600">Aantal: {{ $item->quantity }}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-medium">{{ formatPrice($item->price * $item->quantity) }}</p>
                    </div>
                </div>
            @endforeach

            <div class="mt-4 space-y-2">
                <div class="flex justify-between">
                    <span>Subtotaal</span>
                    <span>{{ formatPrice($order->subtotal) }}</span>
                </div>
                @if ($order->discount > 0)
                    <div class="flex justify-between text-red-600">
                        <span>Korting</span>
                        <span>-{{ formatPrice($order->discount) }}</span>
                    </div>
                @endif
                @if ($order->shipping_cost > 0)
                    <div class="flex justify-between">
                        <span>Verzendkosten</span>
                        <span>{{ formatPrice($order->shipping_cost) }}</span>
                    </div>
                @endif
                <div class="flex justify-between border-t border-gray-200 pt-2 text-lg font-bold">
                    <span>Totaal</span>
                    <span>{{ formatPrice($order->total_amount) }}</span>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <a
                href="{{ route('home') }}"
                class="btn btn-primary"
            >Terug naar home</a>
        </div>
    </div>
</div>
