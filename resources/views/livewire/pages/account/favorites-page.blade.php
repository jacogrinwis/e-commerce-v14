<div class="container grid grid-cols-4 gap-x-16">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>
    @include('livewire.pages.account.partials.menu')
    <main class="col-span-3">
        <h1 class="mb-6 text-2xl font-semibold">Mijn Verlanglijstje</h1>

        @if ($favorites->count() > 0)
            <div class="grid grid-cols-3 gap-6">
                @foreach ($favorites as $product)
                    <livewire:ui.products.card
                        :product="$product"
                        :key="$product->id"
                    />
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Je hebt nog geen favoriete producten.</p>
        @endif
    </main>
</div>
