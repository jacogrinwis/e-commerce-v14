<div class="container">
    <div class="mb-6">
        <x-breadcrumb />
    </div>
    <form wire:submit="createOrder">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <h4 class="mb-4 text-2xl font-semibold">Jouw bezorging en betaling</h4>
                <p class="text-sm text-gray-500">Bekijk jouw gegevens en voltooi je bestelling.</p>
            </div>
            <div
                class="col-span-8 space-y-6"
                x-data="{ shippingMethod: @entangle('shippingMethod') }"
            >
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow">
                    <h2 class="mb-4 text-xl font-semibold">Verzendmethode</h2>
                    <div class="space-y-4 text-sm">
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="pickup"
                                class="input-radio"
                            >
                            <span>Ophalen in winkel (Gratis)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="postnl-standard"
                                class="input-radio"
                            >
                            <span>PostNL Standaard (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="postnl-track-trace"
                                class="input-radio"
                            >
                            <span>PostNL met track & trace (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="dhl-standard"
                                class="input-radio"
                            >
                            <span>DHL Standaard (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="dhl-track-trace"
                                class="input-radio"
                            >
                            <span>DHL met track & trace (€4.95)</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model.live="shippingMethod"
                                value="homerr"
                                class="input-radio"
                            >
                            <span>Homerr (€4.95)</span>
                        </label>
                    </div>
                </div>

                <div
                    x-show="shippingMethod !== 'pickup'"
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow"
                >
                    <h2 class="mb-4 text-xl font-semibold">Verzendadres</h2>

                    @auth
                        <div class="mb-6">
                            <label class="mb-2 block text-sm font-medium">Kies een opgeslagen adres</label>
                            <select
                                wire:model.live="selectedAddressId"
                                class="input-text w-full"
                            >
                                <option value="">Kies een adres</option>
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->id }}">
                                        {{ $address->name }} - {{ $address->street }} {{ $address->house_number }},
                                        {{ $address->city }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endauth

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1 block text-sm">Naam</label>
                            <input
                                type="text"
                                wire:model="shippingAddress.name"
                                class="input-text w-full"
                            >
                            @error('shippingAddress.name')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm">E-mail</label>
                            <input
                                type="email"
                                wire:model="shippingAddress.email"
                                class="input-text w-full"
                            >
                            @error('shippingAddress.email')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm">Straat</label>
                            <input
                                type="text"
                                wire:model="shippingAddress.street"
                                class="input-text w-full"
                            >
                            @error('shippingAddress.street')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm">Huisnummer</label>
                            <input
                                type="text"
                                wire:model="shippingAddress.house_number"
                                class="input-text w-full"
                            >
                            @error('shippingAddress.house_number')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="mb-1 block text-sm">Postcode</label>
                            <input
                                type="text"
                                wire:model="shippingAddress.postal_code"
                                class="input-text w-full"
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
                                class="input-text w-full"
                            >
                            @error('shippingAddress.city')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div
                            x-data="{
                                search: '',
                                open: false,
                                countries: [
                                    { code: 'NL', name: 'Nederland' },
                                    { code: 'BE', name: 'België' },
                                    { code: 'DE', name: 'Duitsland' },
                                    { code: 'F', name: 'Frankrijk' },
                                    { code: 'L', name: 'Luxemburg' },
                                    { code: 'E', name: 'Spanje' },
                                ],
                                filteredCountries() {
                                    return this.countries.filter(country =>
                                        country.name.toLowerCase().includes(this.search.toLowerCase())
                                    )
                                }
                            }"
                            @click.away="open = false"
                        >
                            <label class="mb-1 block text-sm">Land</label>
                            <div class="relative">
                                <input
                                    type="text"
                                    x-model="search"
                                    wire:model="shippingAddress.country"
                                    class="input-text w-full"
                                    @focus="open = true"
                                >
                                <div
                                    x-show="open"
                                    class="absolute z-10 mt-1 w-full rounded-md border border-gray-200 bg-white shadow-lg"
                                >
                                    <template
                                        x-for="country in filteredCountries()"
                                        :key="country.code"
                                    >
                                        <div
                                            class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                            x-text="country.name"
                                            @click="search = country.name; $wire.set('shippingAddress.country', country.name); open = false"
                                        >
                                        </div>
                                    </template>
                                </div>
                            </div>
                            @error('shippingAddress.country')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <label class="mb-1 block text-sm">Telefoon</label>
                            <input
                                type="tel"
                                wire:model="shippingAddress.phone"
                                class="input-text w-full"
                            >
                            @error('shippingAddress.phone')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow">
                    <h2 class="mb-4 text-xl font-semibold">Betaalmethode</h2>
                    <div class="space-y-4 text-sm">
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="banktransfer"
                                class="input-radio"
                            >
                            <span>Bankoverschrijving</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="tikkie"
                                class="input-radio"
                            >
                            <span>Tikkie</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="paypal"
                                class="input-radio"
                            >
                            <span>PayPal</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3">
                            <input
                                type="radio"
                                wire:model="paymentMethod"
                                value="contant"
                                class="input-radio"
                            >
                            <span>In winkel</span>
                        </label>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow">
                    <h2 class="mb-4 text-lg font-semibold">Opmerkingen</h2>
                    <textarea
                        wire:model="notes"
                        rows="3"
                        class="input-text w-full placeholder-gray-400"
                        placeholder="Optionele opmerkingen bij je bestelling"
                    ></textarea>
                </div>
            </div>

            <div class="col-span-4">
                <div class="sticky top-6 rounded-lg border border-gray-200 bg-white p-6 shadow">
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
                                    <h4 class="line-clamp-1 font-medium">{{ $item['product']->name }}</h4>
                                    <p class="text-sm text-gray-600">Aantal: {{ $item['quantity'] }}</p>
                                </div>
                                <div class="text-right">
                                    @if ($item['product']->discount > 0)
                                        <p class="text-sm text-gray-500">
                                            <span class="slashed-text">
                                                {{ formatPrice($item['product']->price * $item['quantity']) }}
                                            </span>
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
                        @if ($shippingMethod !== 'pickup')
                            <div class="flex justify-between">
                                <span>Verzendkosten</span>
                                <span>€4,95</span>
                            </div>
                        @endif
                        <div class="flex justify-between border-t border-gray-200 pt-2 text-lg font-bold">
                            <span>Totaal</span>
                            <span>{{ formatPrice($total + ($shippingMethod !== 'pickup' ? 4.95 : 0)) }}</span>
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
