@php
    use Illuminate\Support\Facades\Route;
@endphp

<div class="container">




    {{-- <div class="w-46 mb-16 bg-red-600 sm:bg-green-600 md:bg-blue-600 lg:aspect-[3/4] lg:bg-yellow-600">

        <div class="grid aspect-[3/4] items-center justify-center sm:aspect-[3/4] md:aspect-[4/3] lg:aspect-[3/4]">

            <span class="xs:inline-block text-xl font-medium text-white sm:hidden">xs</span>
            <span class="hidden text-xl font-medium text-white sm:inline-block md:hidden">sm</span>
            <span class="hidden text-xl font-medium text-white md:inline-block lg:hidden">md</span>
            <span class="hidden text-xl font-medium text-white lg:inline-block">lg</span>

        </div>

    </div> --}}

    {{-- <section class="gallery lg:aspect[3/4] aspect-[3/4] md:aspect-[4/3]">

        <div class="gallery__main">
            <figure>
                <button>
                    <x-icons.arrow-left />
                </button>
                <img>
                <button>
                    <x-icons.arrow-right />
                </button>
            </figure>

            <div class="gallery__thumbnails">
                <figure>
                    <img>
                </figure>
                <figure>
                    <img>
                </figure>
                <figure>
                    <img>
                </figure>
                <figure>
                    <img>
                </figure>
                <figure>
                    <img>
                </figure>
            </div>

        </div>

        <div class="gallery__indicators">
            <button></button>
            <button></button>
            <button></button>
            <button></button>
            <button></button>
        </div>

    </section> --}}

    <main>
        <div class="grid grid-cols-12 items-start gap-6">
            <div class="col-span-7">




                {{-- <div class="demo-gallery">
                    <div class="demo-gallery__main">
                        <figure>
                            <button>
                                <x-icons.arrow-left />
                            </button>
                            <img src="{{ asset('storage/products/images/1.jpg') }}">
                            <button>
                                <x-icons.arrow-right />
                            </button>
                        </figure>
                    </div>
                    <div class="demo-gallery__thumbnails">
                        <figure>
                            <img src="{{ asset('storage/products/images/1.jpg') }}">
                        </figure>
                        <figure>
                            <img src="{{ asset('storage/products/images/2.jpg') }}">
                        </figure>
                        <figure>
                            <img src="{{ asset('storage/products/images/3.jpg') }}">
                        </figure>
                        <figure>
                            <img src="{{ asset('storage/products/images/4.jpg') }}">
                        </figure>
                        <figure>
                            <img src="{{ asset('storage/products/images/5.jpg') }}">
                        </figure>
                    </div>
                </div> --}}






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

                {{-- <div
                    class="grid aspect-[3/4] grid-cols-1 grid-rows-4 gap-4 bg-black sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1">
                    <div>
                        <span class="aspect-square size-full bg-gray-600"></span>
                    </div>
                    <div class="flex-row gap-2 sm:flex-col md:flex-row lg:flex-col">
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                        <span class="aspect-square size-full bg-gray-600"></span>
                    </div>
                </div> --}}


            </div>
        </div>
        <div class="col-span-12">
            {{-- <livewire:pages.products.rating :product="$product" /> --}}
            <livewire:ui.products.ratings :product="$product" />
        </div>
    </main>
</div>
