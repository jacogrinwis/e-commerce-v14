<div class="container pb-6">
    <div>
        <h4 class="mb-4 text-2xl font-semibold">Winkelwagen</h4>
    </div>
    <div class="xgrid-cols-4 grid grid-cols-12 gap-x-6">
        <div class="col-span-8">
            @if ($itemCount > 0)
                <div class="space-y-6">
                    @foreach ($cartItems as $item)
                        <div
                            class="rounded-md border border-gray-200 p-4 shadow"
                            wire:key="cart-item-{{ $item['product']->id }}"
                        >
                            <div class="flex items-center justify-between gap-12">
                                <a
                                    href=""
                                    class="shrink-0"
                                >
                                    <img
                                        src="{{ asset($item['product']->cover) }}"
                                        alt="{{ $item['product']->cover }}"
                                        class="aspect-square size-20 rounded object-cover"
                                    >
                                </a>
                                <div class="w-full min-w-0 flex-1 space-y-4">
                                    <a
                                        href=""
                                        class="line-clamp-2 text-base font-medium hover:underline"
                                    >
                                        {{ $item['product']->name }}
                                    </a>
                                    <div
                                        class="flex items-center gap-4"
                                        wire:key="cart-item-{{ $item['product']->id }}"
                                    >
                                        <livewire:ui.cart.favorite-button
                                            :product-id="$item['product']->id"
                                            :wire:key="'fav-btn-'.$item['product']->id"
                                        />
                                        <button
                                            wire:click="removeItem({{ $item['product']->id }})"
                                            class="inline-flex items-center gap-1 text-sm text-red-500 hover:text-red-500 hover:underline"
                                        >
                                            <x-icons.close class="size-4" />
                                            Verwijderen
                                        </button>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <button
                                            type="button"
                                            wire:click="updateQuantity({{ $item['product']->id }}, {{ $item['quantity'] - 1 }})"
                                            class="inline-flex size-5 items-center justify-center rounded-md border border-gray-200 bg-gray-50"
                                        >
                                            <x-icons.minus class="size-3 text-gray-600" />
                                        </button>
                                        <input
                                            type="text"
                                            wire:model.live="quantity"
                                            wire:change="updateQuantity({{ $item['product']->id }}, $event.target.value)"
                                            value="{{ $item['quantity'] }}"
                                            class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium focus:outline-0 focus:ring-0"
                                            required
                                        >
                                        <button
                                            type="button"
                                            wire:click="updateQuantity({{ $item['product']->id }}, {{ $item['quantity'] + 1 }})"
                                            class="inline-flex size-5 items-center justify-center rounded-md border border-gray-200 bg-gray-50"
                                        >
                                            <x-icons.plus class="size-3 text-gray-600" />
                                        </button>
                                    </div>
                                    <div class="w-32 text-end">
                                        @if ($item['product']->discount > 0)
                                            <p class="text-sm text-gray-500 line-through">
                                                {{ formatPrice($item['product']->price * $item['quantity']) }}
                                            </p>
                                            <p class="text-base font-bold text-red-600">
                                                {{ formatPrice($item['product']->discounted_price * $item['quantity']) }}
                                            </p>
                                        @else
                                            <p class="text-base font-bold">
                                                {{ formatPrice($item['product']->price * $item['quantity']) }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div>
        <div class="col-span-4 h-fit rounded-md border border-gray-200 p-6 shadow">
            <h4 class="mb-4 text-xl font-semibold">Besteloverzicht</h4>
            <div class="space-y-4">
                <div class="space-y-2">
                    <dl class="flex justify-between">
                        <dt class="text-base">Subtotaal</dt>
                        <dd class="text-base font-medium">{{ formatPrice($subtotal) }}</dd>
                    </dl>
                    @if ($discount > 0)
                        <dl class="flex justify-between text-red-600">
                            <dt class="text-base font-medium">Korting</dt>
                            <dd class="text-base font-bold">-{{ formatPrice($discount) }}</dd>
                        </dl>
                    @endif
                </div>
                <dl class="flex justify-between border-t border-gray-200 pt-2">
                    <dt class="text-base font-semibold">Totaal</dt>
                    <dd class="text-lg font-bold">{{ formatPrice($total) }}</dd>
                </dl>
            </div>
            <p class="my-4 text-sm text-gray-500">Verzendkosten worden berekend bij het afrekenen.</p>
            <a
                href="{{ route('cart.checkout') }}"
                class="btn btn-primary mt-6 block text-center"
            >
                Doorgaan met bestellen
            </a>
            <p class="mt-4 text-center text-sm text-gray-500">
                of <a
                    href="#"
                    class="text-blue-500 underline"
                >
                    Verder winkelen
                </a>
            </p>
        </div>
    </div>
</div>
