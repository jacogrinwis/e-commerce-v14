<div class="w-[calc(24rem-2rem)]">
    @if ($itemCount > 0)
        <div class="flex flex-col gap-4 divide-y divide-gray-200">
            @foreach ($cartItems as $item)
                <div class="flex items-center gap-4 pb-4">
                    <div class="shrink-0">
                        <img
                            src="{{ asset($item['product']->cover) }}"
                            alt="{{ $item['product']->cover }}"
                            class="aspect-square size-12 rounded object-cover"
                        >
                    </div>
                    <div class="min-w-0 grow truncate text-sm">
                        {{ $item['product']->name }}
                        @if ($item['quantity'] > 1)
                            <p class="mt-1 text-gray-500">Aantal {{ $item['quantity'] }}</p>
                        @endif
                    </div>
                    <div class="flex shrink-0 flex-col text-right">
                        <div class="text-sm font-bold">
                            {{ formatPrice($item['product']->price * $item['quantity']) }}
                        </div>
                        <div class="">
                            <button
                                class="cursor-pointer text-sm text-gray-500 hover:underline"
                                wire:click="removeItem({{ $item['product']->id }})"
                            >verwijderen</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex justify-between border-t border-gray-200 py-4 text-lg font-semibold">
            <span>Subtotaal</span>
            <span>{{ formatPrice($subtotal) }}</span>
        </div>
        <p class="text-sm text-gray-500">Verzendkosten en belastingen worden berekend bij het afrekenen.</p>
        <button class="btn btn-primary mb-2 mt-4 w-full">Bestellen</button>
        <a
            href="{{ route('cart.shopping-cart') }}"
            class="btn btn-secondary mb-2 mt-4 block text-center"
        >
            Wijzig winkelwagen
        </a>
    @else
        <h5 class="text-xl font-semibold">Je winkelwagen is nog leeg!</h5>
        <p class="my-4 text-sm">Ontdek ons aanbod en voeg artikelen toe aan je winkelmand!</p>
        <button
            class="btn btn-secondary mt-4 w-full"
            data-drawer-close
        >Verder winkelen</button>
    @endif
</div>
