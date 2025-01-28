<div class="container my-24 grid grid-cols-4 gap-16">
    <aside
        wire:loading.class="opacity-50"
        x-data="{ open: true }"
        class="col-span-1 space-y-6 text-sm"
    >
        @include('partials.products.product-filters')
    </aside>

    <main
        wire:loading.class="opacity-50"
        class="col-span-3 grid grid-cols-3 gap-6"
    >
        @foreach ($products as $product)
            <livewire:ui.products.product-card
                :$product
                wire:key="product-{{ $product->id }}"
            />
        @endforeach
    </main>
</div>
