<div class="container pb-6">
    <div class="mb-6">
        <x-breadcrumb />
    </div>

    {{-- @dd(Auth::user()) --}}

    <form wire:submit="createOrder">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <h4 class="mb-4 text-2xl font-semibold">Jouw bezorging en betaling</h4>
                <p class="mb-4 text-sm text-gray-500">Bekijk jouw gegevens en voltooi je bestelling.</p>
            </div>
            <div class="col-span-8 space-y-6">
                <div class="rounded-lg border border-gray-200 bg-white p-6">
                    <h2 class="mb-4 text-xl font-semibold">Verzendmethode</h2>
                    <div class="space-y-4 text-sm">
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="pickup"
                                class="h-4 w-4"
                            >
                            <span>Ophalen in winkel</span> (Gratis)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="delivery"
                                class="h-4 w-4"
                            >
                            <span>PostNL Standaard (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="delivery"
                                class="h-4 w-4"
                            >
                            <span>PostNL met track & trace (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="delivery"
                                class="h-4 w-4"
                            >
                            <span>DHL Standaard (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="delivery"
                                class="h-4 w-4"
                            >
                            <span>DHL met track & trace (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="shippingMethod"
                                value="delivery"
                                class="h-4 w-4"
                            >
                            <span>Homerr (€4.95)</span>
                        </label>
                    </div>
                </div>

                @if ($shippingMethod === 'delivery')
                    <div class="rounded-lg border border-gray-200 bg-white p-6">
                        <h2 class="mb-4 text-xl font-semibold">Verzendadres</h2>
                        <div class="space-y-4">
                            <div>
                                <label class="mb-1 block text-sm">Straat + huisnummer</label>
                                <input
                                    type="text"
                                    wire:model="shippingAddress.street"
                                    class="input"
                                >
                                @error('shippingAddress.street')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-sm">Postcode</label>
                                <input
                                    type="text"
                                    wire:model="shippingAddress.postal_code"
                                    class="input"
                                >
                                @error('shippingAddress.postal_code')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="mb-1 block text-sm">Plaats</label>
                                <input
                                    type="text"
                                    wire:model="shippingAddress.city"
                                    class="input"
                                >
                                @error('shippingAddress.city')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <div class="rounded-lg border border-gray-200 bg-white p-6">
                    <h2 class="mb-4 text-xl font-semibold">Betaalmethode</h2>
                    <div class="space-y-4 text-sm">
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="banktransfer"
                                class="h-4 w-4"
                            >
                            <span>Bankoverschrijving</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="tikkie"
                                class="h-4 w-4"
                            >
                            <span>Tikkie</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="paypal"
                                class="h-4 w-4"
                            >
                            <span>PayPal</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="contant"
                                class="h-4 w-4"
                            >
                            <span>In winkel</span>
                        </label>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6">
                    <h2 class="mb-4 text-lg font-semibold">Opmerkingen</h2>
                    <textarea
                        wire:model="notes"
                        rows="3"
                        class="input-text w-full"
                        placeholder="Optionele opmerkingen bij je bestelling"
                    ></textarea>
                </div>
            </div>

            <div class="col-span-4">
                <div class="sticky top-6 rounded-lg border border-gray-200 bg-white p-6">
                    <h2 class="mb-4 text-xl font-semibold">Besteloverzicht</h2>

                    <div class="max-h-64 overflow-y-auto">
                        @foreach ($cartItems as $item)
                            <div class="flex items-center gap-4 py-3">
                                <img
                                    src="{{ asset($item['product']->cover) }}"
                                    alt="{{ $item['product']->name }}"
                                    class="h-16 w-16 rounded-md object-cover"
                                >
                                <div class="flex-1">
                                    <h4 class="xtruncate line-clamp-1 font-medium">{{ $item['product']->name }}</h4>
                                    <p class="text-sm text-gray-600">Aantal: {{ $item['quantity'] }}</p>
                                </div>
                                <div class="text-right">
                                    @if ($item['product']->discount > 0)
                                        <p class="text-sm text-gray-500 line-through">
                                            {{ formatPrice($item['product']->price * $item['quantity']) }}
                                        </p>
                                        <p class="font-medium text-red-600">
                                            {{ formatPrice($item['product']->discounted_price * $item['quantity']) }}
                                        </p>
                                    @else
                                        <p class="font-medium">
                                            {{ formatPrice($item['product']->price * $item['quantity']) }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="space-y-2 border-t border-gray-200 pt-4">
                        <div class="flex justify-between">
                            <span>Subtotaal</span>
                            <span>{{ formatPrice($subtotal) }}</span>
                        </div>
                        @if ($discount > 0)
                            <div class="flex justify-between text-red-600">
                                <span>Korting</span>
                                <span>-{{ formatPrice($discount) }}</span>
                            </div>
                        @endif
                        @if ($shippingMethod === 'delivery')
                            <div class="flex justify-between">
                                <span>Verzendkosten</span>
                                <span>€4,95</span>
                            </div>
                        @endif
                        <div class="flex justify-between border-t border-gray-200 pt-2 text-lg font-bold">
                            <span>Totaal</span>
                            <span>{{ formatPrice($total + ($shippingMethod === 'delivery' ? 4.95 : 0)) }}</span>
                        </div>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary mt-6 w-full"
                    >
                        Bestelling plaatsen
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
