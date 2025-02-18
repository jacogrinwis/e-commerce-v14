<div class="container grid grid-cols-4 gap-16">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>

    @include('livewire.pages.account.partials.menu')

    <main class="col-span-3">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-semibold">Mijn adressen</h1>
            <button
                wire:click="create"
                class="btn btn-primary"
            >
                Nieuw adres toevoegen
            </button>
        </div>

        @if ($showForm)
            <div class="mb-6 rounded-lg border border-gray-200 bg-white p-6">
                <h2 class="mb-4 text-lg font-semibold">
                    {{ $editingAddress ? 'Adres bewerken' : 'Nieuw adres toevoegen' }}
                </h2>
                <form
                    wire:submit="save"
                    class="space-y-4"
                >
                    <div>
                        <label class="mb-1 block text-sm font-medium">Naam</label>
                        <input
                            type="text"
                            wire:model="name"
                            class="input-text w-full"
                        >
                        @error('name')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium">Email</label>
                        <input
                            type="email"
                            wire:model="email"
                            class="input-text w-full"
                        >
                        @error('email')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-1 block text-sm font-medium">Telefoon</label>
                        <input
                            type="tel"
                            wire:model="phone"
                            class="input-text w-full"
                        >
                        @error('phone')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <div class="grow">
                            <label class="mb-1 block text-sm font-medium">Straat</label>
                            <input
                                type="text"
                                wire:model="street"
                                class="input-text w-full"
                            >
                            @error('street')
                                <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium">Huisnummer</label>
                            <input
                                type="text"
                                wire:model="house_number"
                                class="input-text"
                            >
                            @error('house_number')
                                <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium">Postcode</label>
                            <input
                                type="text"
                                wire:model="postal_code"
                                class="input-text"
                            >
                            @error('postal_code')
                                <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="grow">
                            <label class="mb-1 block text-sm font-medium">Plaats</label>
                            <input
                                type="text"
                                wire:model="city"
                                class="input-text w-full"
                            >
                            @error('city')
                                <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div>
                        <label class="mb-1 block text-sm font-medium">Land</label>
                        <input
                            type="text"
                            wire:model="country"
                            class="input-text w-full"
                        >
                        @error('country')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div> --}}

                    {{-- <div
                        x-data="{
                            search: '',
                            countries: [
                                { code: 'NL', name: 'Nederland' },
                                { code: 'BE', name: 'België' },
                                { code: 'DE', name: 'Duitsland' },
                                { code: 'F', name: 'Frankrijk' },
                                { code: 'L', name: 'Luxemburg' },
                                // Add more countries
                            ],
                            filteredCountries() {
                                return this.countries.filter(country =>
                                    country.name.toLowerCase().includes(this.search.toLowerCase())
                                )
                            }
                        }"
                        @click.away="open = false"
                    >
                        <label class="mb-1 block text-sm font-medium">Land</label>
                        <div class="relative">
                            <input
                                type="text"
                                x-model="search"
                                wire:model="country"
                                class="input-text w-full"
                                @focus="$el.nextElementSibling.classList.remove('hidden')"
                            >
                            <div
                                class="absolute z-10 mt-1 hidden w-full rounded-md border border-gray-200 bg-white shadow-lg">
                                <template
                                    x-for="country in filteredCountries()"
                                    :key="country.code"
                                >
                                    <div
                                        class="cursor-pointer px-4 py-2 hover:bg-gray-100"
                                        x-text="country.name"
                                        @click="search = country.name; $wire.set('country', country.name); $el.parentElement.classList.add('hidden')"
                                    >
                                    </div>
                                </template>
                            </div>
                        </div>
                        @error('country')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div> --}}

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
                        <label class="mb-1 block text-sm font-medium">Land</label>
                        <div class="relative">
                            <input
                                type="text"
                                x-model="search"
                                wire:model="country"
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
                                        @click="search = country.name; $wire.set('country', country.name); open = false"
                                    >
                                    </div>
                                </template>
                            </div>
                        </div>
                        @error('country')
                            <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <label class="flex items-center gap-2">
                        <input
                            type="checkbox"
                            wire:model="is_default"
                            class="input-checkbox"
                        >
                        <span class="text-sm">Instellen als standaard adres</span>
                    </label>

                    <div class="flex gap-2">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >Opslaan</button>
                        <button
                            type="button"
                            wire:click="$set('showForm', false)"
                            class="btn btn-secondary"
                        >Annuleren</button>
                    </div>
                </form>
            </div>
        @endif

        <div class="grid grid-cols-2 gap-4">
            @forelse($addresses as $address)
                <div class="rounded-md border border-gray-200 bg-white p-6 shadow">
                    @if ($address->is_default)
                        <span
                            class="mb-2 inline-block rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800"
                        >
                            Standaard adres
                        </span>
                    @endif
                    <h3 class="mb-1 font-medium">{{ $address->name }}</h3>
                    <p class="text-gray-600">
                        {{ $address->street }} {{ $address->house_number }}<br>
                        {{ $address->postal_code }} {{ $address->city }}<br>
                        {{ $address->country }}
                    </p>
                    <div class="mt-4 flex gap-2">
                        <button
                            wire:click="edit({{ $address->id }})"
                            class="text-sm text-blue-600 hover:underline"
                        >
                            Bewerken
                        </button>
                        <button
                            wire:click="delete({{ $address->id }})"
                            wire:confirm="Weet je zeker dat je dit adres wilt verwijderen?"
                            class="text-sm text-red-600 hover:underline"
                        >
                            Verwijderen
                        </button>
                    </div>
                </div>
            @empty
                <p class="col-span-2 text-gray-600">Je hebt nog geen adressen toegevoegd.</p>
            @endforelse
        </div>
    </main>
</div>
