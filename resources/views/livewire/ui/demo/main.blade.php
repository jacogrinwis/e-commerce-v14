<div>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism-okaidia.min.css"
    >

    <button wire:click="$dispatch('show-aside-message', { message: 'Received message!' })">
        Show message
    </button>

    @if (!empty($selectedItems))
        <div class="flex flex-wrap gap-2">
            @foreach ($selectedItems as $item)
                <button>
                    <span>Item {{ $item }}</span>
                    <x-icons.close
                        wire:key="item-{{ $item }}"
                        wire:click="$dispatch('remove-item', { item: {{ $item }} })"
                        class="text-gray-400 hover:text-white"
                    />
                </button>
            @endforeach
        </div>
    @endif


    @if (!empty($selectedItems))
        <div>
            <pre class="language-html">{{ json_encode($selectedItems) }}</pre>
        </div>
    @endif

    {{-- <p
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
        class="dark-alert"
    >
        {{ json_encode($selectedItems) }}
    </p> --}}


    {{-- @if (session('successfully-removed-item'))
        <p
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="timeout = setTimeout(() => {
                show = false;
                $wire.doNothing()
            }, 2000)"
            class="success-alert"
        >
            {{ session('successfully-removed-item') }}
        </p>
    @endif --}}

    @if (session('successfully-removed-item'))
        <x-alert-message type="success">
            {{ session('successfully-removed-item') }}
        </x-alert-message>
    @endif

    @if (session('success-from-aside-to-main'))
        <x-alert-message type="success">
            {{ session('success-from-aside-to-main') }}
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
            {{ session('success-from-aside-to-main') }}
        </p> --}}
    @endif

    @if (session('message-from-aside-to-main'))
        <x-alert-message type="info">
            {{ session('message-from-aside-to-main') }}
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
            {{ session('message-from-aside-to-main') }}
        </p> --}}
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>

</div>
