<div class="demo">

    <aside>

        <section>
            <label>
                <input
                    type="checkbox"
                    value="1"
                    wire:model.live="selectedItems"
                >
                <span>Item nr.(1)</span>
            </label>

            <label>
                <input
                    type="checkbox"
                    value="2"
                    wire:model.live="selectedItems"
                >
                <span>Item nr.(2)</span>
            </label>

            <label>
                <input
                    type="checkbox"
                    value="3"
                    wire:model.live="selectedItems"
                >
                <span>Item nr.(3)</span>
            </label>

            <label>
                <input
                    type="checkbox"
                    value="4"
                    wire:model.live="selectedItems"
                >
                <span>Item nr.(4)</span>
            </label>
        </section>

        <button wire:click="$dispatch('show-main-message', { message: 'Received message!' })">
            Show message
        </button>

        @if (!empty($selectedItems))
            <p
                x-data="{
                    show: false,
                    selectedItems: @entangle('selectedItems'),
                    timeoutId: null,
                    startTimeout() {
                        clearTimeout(this.timeoutId); // Annuleer vorige timeout
                        this.show = true;
                        this.timeoutId = setTimeout(() => this.show = false, 2000);
                    }
                }"
                x-show="show"
                x-transition
                x-cloak
                x-init="$watch('selectedItems', () => startTimeout())"
                class="info-alert"
            >
                {{ json_encode($selectedItems) }}
            </p>
        @endif

        @if (session('message-from-main-to-aside'))
            <x-alert-message type="info">
                {{ session('message-from-main-to-aside') }}
            </x-alert-message>
            {{-- <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="timeout = setTimeout(() => {
                    show = false;
                    $wire.doNothing()
                }, 2000)"
                class="info-alert"
            >
                {{ session('message-from-main-to-aside') }}
            </p> --}}
        @endif

        @if (session('success-from-main-to-aside'))
            <x-alert-message type="success">
                {{ session('success-from-main-to-aside') }}
            </x-alert-message>
            {{-- <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="timeout = setTimeout(() => {
                    show = false;
                    $wire.doNothing()
                }, 2000)"
                class="success-alert"
            >
                {{ session('success-from-main-to-aside') }}
            </p> --}}
        @endif

        <button wire:click="$dispatch('first-this-then-that')">First this then that</button>

        @if (session('first-this-then-that'))
            <x-alert-message type="dark">
                {{ session('first-this-then-that') }}
            </x-alert-message>
            {{-- <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="timeout = setTimeout(() => {
                    show = false;
                    $wire.doNothing()
                }, 2000)"
                class="dark-alert"
            >
                {{ session('first-this-then-that') }}
            </p> --}}
        @endif

    </aside>

    <main>
        <livewire:ui.demo.main />
    </main>

</div>
