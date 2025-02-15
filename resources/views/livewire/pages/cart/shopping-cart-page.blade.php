<div class="container">
    <div class="grid grid-cols-4 gap-x-6">
        <div class="col-span-3 min-h-96">
            @if ($itemCount > 0)
                <div class="space-y-6">
                    @foreach ($cartItems as $item)
                        <div
                            class="rounded-md border border-gray-200 p-4"
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
                                            class="inline-flex items-center gap-1 text-sm font-medium text-red-500 hover:text-red-500 hover:underline"
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
                                        <p class="text-base font-bold">
                                            {{ formatPrice($item['product']->price) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            @endif
        </div>
        <div class="col-span-1 min-h-96 rounded-md border border-gray-200 p-4"></div>
    </div>
</div>
