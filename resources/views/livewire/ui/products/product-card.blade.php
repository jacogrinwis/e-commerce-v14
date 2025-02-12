{{-- <div class="mb-4">
    <p>{{ $product->name }}</p>
    <p>{{ formatPrice($product->price) }}</p>
</div> --}}

<div class="col-md-4">
    <div
        class="space-y-2 rounded border border-gray-200 bg-white p-4 shadow-sm transition-all duration-300 hover:scale-105 hover:shadow-lg">
        <div class="card-body">
            <a
                href="{{ route('products.detail', ['product' => $product->slug]) }}"
                wire:navigate
            >
                <figure class="relative">
                    <img
                        src="{{ asset($product->cover) }}"
                        alt="{{ $product->name }}"
                        class="mb-2 aspect-square w-full rounded-md object-cover"
                    >
                    <div class="absolute bottom-2 left-2">
                        @foreach ($product->colors as $color)
                            <span
                                class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} inline-block size-5 rounded-full shadow-sm"
                            ></span>
                        @endforeach
                    </div>
                    {{-- <span
                        class="absolute left-2 top-2 min-w-10 rounded-full bg-black/50 p-1 text-center text-white"
                    >
                        {{ $product->images->count() }}
                    </span> --}}
                </figure>
            </a>
            <div class="h-14">
                <a
                    href="{{ route('products.detail', ['product' => $product->slug]) }}"
                    wire:navigate
                >
                    <h2 class="line-clamp-2 text-xl font-semibold">{{ $product->name }}</h2>
                </a>
            </div>
            <div>
                <livewire:ui.products.favorite-button :product="$product" />
            </div>
            <div>
                <x-products.stock-status :status="$product->stock_status" />
            </div>
            <div class="mb-2 grid h-14 grid-cols-2 gap-2">
                <div class="grid items-end">
                    @if ($product->discount > 0)
                        <p class="text-base text-gray-500 line-through">
                            {{ formatPrice($product->price) }}
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
                            <x-products.add-to-cart-button
                                @click.prevent.stop
                                :id="$product->id"
                                :disabled="$product->stock_status === 'out_of_stock' ? true : false"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
