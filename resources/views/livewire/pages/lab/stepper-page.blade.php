<div class="container mx-auto p-6">
    <div class="mb-8 flex justify-between">
        @foreach ($steps as $step => $label)
            <div class="text-center">
                <div
                    class="{{ $step <= $currentStep ? 'bg-blue-500' : 'bg-gray-300' }} mx-auto flex h-10 w-10 items-center justify-center rounded-full font-bold text-white">
                    {{ $step }}
                </div>
                <div class="mt-2">{{ $label }}</div>
            </div>
        @endforeach
    </div>

    <div class="rounded-lg bg-white p-6 shadow-lg">
        @if ($currentStep === 1)
            <h2 class="mb-4 text-xl font-bold">Kies je verzendmethode</h2>
            <div class="space-y-4">
                @foreach ($shippingMethods as $value => $method)
                    <label class="flex cursor-pointer items-center rounded-lg border p-4 hover:bg-gray-50">
                        <input
                            id="shippingMethod-{{ $value }}"
                            type="radio"
                            wire:model="shippingMethod"
                            value="{{ $value }}"
                            class="mr-3"
                        >
                        <div>
                            <div class="font-medium">{{ $method['name'] }}</div>
                            <div class="text-sm text-gray-500">
                                @if ($method['cost'] > 0)
                                    €{{ number_format($method['cost'], 2) }}
                                @else
                                    Gratis
                                @endif
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
        @elseif($currentStep === 2)
            <h2 class="mb-4 text-xl font-bold">Kies je betaalmethode</h2>
            <div class="space-y-4">
                @foreach ($paymentMethods as $value => $name)
                    <label class="flex cursor-pointer items-center rounded-lg border p-4 hover:bg-gray-50">
                        <input
                            id="paymentMethod-{{ $value }}"
                            type="radio"
                            wire:model="paymentMethod"
                            value="{{ $value }}"
                            class="mr-3"
                        >
                        <span class="font-medium">{{ $name }}</span>
                    </label>
                @endforeach
            </div>
        @elseif($currentStep === 3)
            <h2 class="mb-4 text-xl font-bold">Bevestig je bestelling</h2>
            <div class="space-y-4">
                <div class="rounded-lg bg-gray-50 p-4">
                    <h3 class="mb-2 font-medium">Verzendmethode</h3>
                    <p>{{ $shippingMethods[$shippingMethod]['name'] ?? 'No shipping' }}</p>
                </div>
                <div class="rounded-lg bg-gray-50 p-4">
                    <h3 class="mb-2 font-medium">Betaalmethode</h3>
                    <p>{{ $paymentMethods[$paymentMethod] ?? 'No payment' }}</p>
                </div>
                <div>
                    <label class="mb-2 block font-medium">Opmerkingen</label>
                    <textarea
                        wire:model="notes"
                        rows="3"
                        class="w-full rounded-lg border p-2"
                    ></textarea>
                </div>
            </div>
        @endif
    </div>

    <div class="flex justify-between">
        @if ($currentStep > 1)
            <button
                wire:click="previousStep"
                class="btn btn-secondary"
            >Vorige</button>
        @endif

        @if ($currentStep < 3)
            <button
                wire:click="nextStep"
                class="btn btn-primary"
            >Volgende</button>
        @endif
    </div>
</div>
