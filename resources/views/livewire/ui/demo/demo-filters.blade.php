<div>
    <h5 class="text-md mb-2 font-medium">Demo Filters</h5>

    <div class="grid gap-2">

        {{-- <label>
            <input
                type="checkbox"
                value="1"
                wire:model.live="selectedItems"
            >
            Item 1
        </label>

        <label>
            <input
                type="checkbox"
                value="2"
                wire:model.live="selectedItems"
            >
            Item 2
        </label>

        <label>
            <input
                type="checkbox"
                value="3"
                wire:model.live="selectedItems"
            >
            Item 3
        </label>

        <label>
            <input
                type="checkbox"
                value="4"
                wire:model.live="selectedItems"
            >
            Item 4
        </label> --}}

        <label>
            <input
                type="checkbox"
                value="5"
                wire:click="$dispatchTo('pages.demo.demo-list', 'customEvent', { message: 'Hello from Blade!' })"
            >
            Item 5
        </label>

    </div>
</div>
