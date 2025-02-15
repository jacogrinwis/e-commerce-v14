<div class="container mx-auto px-4 py-8">
    <div class="mb-6">
        <x-breadcrumb />
    </div>
    <h1 class="mb-6 text-2xl font-bold">Mijn Favorieten</h1>

    @if ($favorites->count() > 0)
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($favorites as $product)
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="relative">
                        <img
                            src="{{ asset($product->cover) }}"
                            alt="{{ $product->name }}"
                            class="aspect-square w-full object-cover"
                        >
                    </div>
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-semibold">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-600">{{ $product->category->name }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-xl font-bold">{{ formatPrice($product->price) }}</span>
                            <livewire:ui.products.favorite-button
                                :product="$product"
                                :key="$product->id"
                            />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-500">Je hebt nog geen favoriete producten.</p>
    @endif
</div>
