<div class="container pt-24">
    <div class="grid grid-cols-4 gap-16">

        <aside>
            <livewire:ui.demo.demo-filters />
        </aside>

        <main>
            <h4 class="mb-2 text-lg font-medium">Demo List</h4>

            <h1>Message from Child: {{ $message }}</h1>

            {{-- @foreach ($selectedItems as $item)
                <p>Item {{ $item }}</p>
            @endforeach --}}
        </main>

    </div>
</div>
