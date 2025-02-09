<div class="demo">

    <aside>
        <label>
            <input
                type="checkbox"
                wire:click="$dispatch('show-message', { message: 'Hello from Blade!' })"
            >
            <span>Show message</span>
        </label>

        <button wire:click="$dispatch('ui.demo.demo-child', 'show-message', { message: 'Hello from Blade!' })">
            Show message
        </button>

        <button wire:click="$dispatch('demo-child', 'show-message', { message: 'Hello from Blade!' })">
            Show message
        </button>
    </aside>

    <main>
        <livewire:ui.demo.demo-child />
    </main>

</div>
