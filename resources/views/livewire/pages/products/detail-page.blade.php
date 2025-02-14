@php
    use Illuminate\Support\Facades\Route;
@endphp

<div class="container">
    <main>
        <div class="mb-6">
            <x-breadcrumb />
        </div>
        <div class="grid grid-cols-12 items-start gap-6">
            <div class="col-span-7">
                <x-products.product-gallery :images="$product->images" />
            </div>
            <div class="col-span-5 space-y-6 rounded border border-gray-200 p-6 shadow-sm">
                <div>
                    <div>
                        <h2 class="mb-2 text-3xl font-bold">{{ $product->name }}</h2>
                    </div>
                    <div>
                        <x-rating :rating="3" />
                        <span class="ml-1 inline-flex h-3 items-center border-l border-gray-400 pl-2 text-gray-400">
                            {{ $product->product_number }}
                        </span>
                    </div>
                </div>
                <div class="grid items-end">
                    @if ($product->discount > 0)
                        <p class="text-xl text-gray-500 line-through">
                            {{ formatPrice($product->price) }}
                        </p>
                        <p class="text-3xl font-bold text-red-600">
                            {{ formatPrice($product->discount_price) }}
                        </p>
                    @else
                        <p class="text-3xl font-bold">
                            {{ formatPrice($product->price) }}
                        </p>
                    @endif
                </div>
                <div>
                    <x-products.stock-status :status="$product->stock_status" />
                </div>
                <div class="flex items-center gap-2">
                    <button
                        class="{{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'opacity-50 cursor-not-allowed' : '' }} flex grow items-center justify-center space-x-2 rounded-md bg-blue-600 px-2 py-1.5 text-lg font-semibold text-white transition-all duration-300 hover:bg-blue-700"
                        {{ $product->stock_status === 'out_of_stock' || $product->stock_status === 'coming_soon' ? 'disabled' : '' }}
                    >
                        <span>
                            <x-icons.cart class="size-5 text-white" />
                        </span>
                        <span>In winkelwagen</span>
                    </button>
                    <livewire:ui.products.favorite-button :product="$product" />
                </div>
                <div class="space-x-1">
                    <h4 class="mb-1 text-base font-semibold">Kleur:</h4>
                    <livewire:ui.products.color-badges :colors="$product->colors" />
                </div>
                <div>
                    <h4 class="mb-1 text-base font-semibold">Materiaal:</h4>
                    <div>
                        @foreach ($product->materials as $material)
                            {{ $material->name }}{{ !$loop->last ? ',' : '' }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <livewire:ui.products.ratings :product="$product" />
        </div>
    </main>
</div>
