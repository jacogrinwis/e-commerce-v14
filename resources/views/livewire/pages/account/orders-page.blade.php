<div class="container grid grid-cols-4 gap-x-16">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>

    @include('livewire.pages.account.partials.menu')

    <main class="col-span-3">
        <h1 class="mb-6 text-2xl font-semibold">Mijn bestellingen</h1>

        <div class="space-y-4">
            @forelse ($orders as $order)
                <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-200 bg-gray-50 p-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium">Bestelling #{{ $order->order_number }}</p>
                                <p class="text-sm text-gray-600">Geplaatst op {{ $order->created_at->format('d-m-Y') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">{{ formatPrice($order->total_amount) }}</p>
                                {{-- <span
                                    class="@switch($order->status)
                                        @case('pending') bg-yellow-100 text-yellow-800 @break
                                        @case('processing') bg-blue-100 text-blue-800 @break
                                        @case('completed') bg-green-100 text-green-800 @break
                                        @case('cancelled') bg-red-100 text-red-800 @break
                                    @endswitch inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium"
                                >
                                    {{ ucfirst($order->status) }}
                                </span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="divide-y divide-gray-200">
                        @foreach ($order->orderItems as $item)
                            <div class="flex items-center gap-4 p-4">
                                <img
                                    src="{{ asset($item->product->cover) }}"
                                    alt="{{ $item->product->name }}"
                                    class="h-16 w-16 rounded-md object-cover"
                                >
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-medium">{{ $item->product->name }}</h4>
                                    <p class="text-sm text-gray-600">Aantal: {{ $item->quantity }}</p>
                                </div>
                                <div class="text-right">
                                    @if ($item->product->discount_price > null)
                                        <p class="font-medium text-green-500">
                                            {{ formatPrice($item->product->discount_price) }}
                                        </p>
                                    @else
                                        <p class="font-medium">
                                            {{ formatPrice($item->price) }}
                                        </p>
                                    @endif
                                    <p class="text-sm text-gray-600">Per stuk</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-gray-200 bg-gray-50 p-4">
                        <div class="flex justify-between text-sm">
                            <span>Subtotaal</span>
                            <span>{{ formatPrice($order->subtotal) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span>Verzendkosten</span>
                            <span>{{ formatPrice($order->shipping_cost) }}</span>
                        </div>
                        <div class="mt-2 flex justify-between border-t border-gray-200 pt-2 font-medium">
                            <span>Totaal</span>
                            <span>{{ formatPrice($order->total_amount) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-lg border border-gray-200 bg-white p-6 text-center">
                    <p class="text-gray-600">Je hebt nog geen bestellingen geplaatst.</p>
                </div>
            @endforelse
        </div>
    </main>
</div>
