<div class="col-md-4">
    <div
        class="hover:scale-101 shadow-xs space-y-2 rounded border border-gray-200 bg-white p-4 transition-all duration-300 hover:shadow-sm">
        <div class="card-body">

            <div class="relative mb-2">
                <a
                    href="{{ route('products.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"
                    wire:navigate
                >
                    <img
                        src="{{ asset($product->cover) }}"
                        alt="{{ $product->name }}"
                        class="aspect-square w-full rounded-md object-cover"
                    >
                </a>
                <div class="absolute right-2 top-2">
                    <livewire:ui.products.favorite-button :product="$product" />
                </div>
                <div class="absolute bottom-2 left-2">
                    <livewire:ui.products.color-badges :colors="$product->colors" />
                </div>
                @if ($product->discount > 0)
                    <span
                        class="absolute bottom-4 right-4 inline-flex items-center justify-center rounded-sm bg-red-600 px-1 text-sm font-bold text-white"
                    >
                        korting {{ $product->discount }}%
                    </span>
                @endif
            </div>

            <div class="h-14">
                <a
                    href="{{ route('products.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"
                    wire:navigate
                >
                    <h2 class="line-clamp-2 text-lg font-semibold tracking-tight">{{ $product->name }}</h2>
                </a>
            </div>
            <div>
                <x-products.stock-status :status="$product->stock_status" />
            </div>
            <div class="grid h-14 grid-cols-2 gap-2">
                <div class="grid items-end">
                    @if ($product->discount > 0)
                        <p>
                            <span class="slashed-text text-base text-gray-600">
                                {{ formatPrice($product->price) }}
                            </span>
                        </p>
                        <p class="text-xl font-bold text-red-600">
                            {{ formatPrice($product->discount_price) }}
                        </p>
                    @else
                        <p class="text-xl font-bold">
                            {{ formatPrice($product->price) }}
                        </p>
                    @endif
                </div>
                <div class="grid items-end justify-end">
                    <div class="relative">
                        <div class="relative z-20">
                            <livewire:ui.products.add-to-cart-listing-button
                                @click.prevent.stop
                                :productId="$product->id"
                                :disabled="$product->stock_status === 'out_of_stock' ? true : false"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
