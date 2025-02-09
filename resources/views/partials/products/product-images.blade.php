@php
    $styles = [
        'wrapper' => [
            'base' => 'grid relative',
            'xs' => 'aspect-[3/4] grid-cols-1 grid-rows-4 gap-4',
            'sm' => 'sm:aspect-[4/3] sm:grid-cols-4 sm:grid-rows-1 sm:gap-2',
            'md' => 'md:aspect-[3/4] md:grid-cols-1 md:grid-rows-4 md:gap-4',
            'lg' => 'lg:aspect-[4/3] lg:grid-cols-4 lg:grid-rows-1 lg:gap-2',
        ],
        'mainImage' => [
            'base' => 'col-span-3 row-span-3 relative',
            'xs' => 'order-1',
            'sm' => 'sm:order-2',
            'md' => 'md:order-1',
            'lg' => 'lg:order-2',
        ],
        'mainImageButton' => [
            'base' =>
                'absolute top-1/2 transform -translate-y-1/2 rounded-full bg-black/50 bg-opacity-50 p-2 text-white transition-opacity hover:bg-black/75',
        ],
        'thumbnails' => [
            'base' => 'relative flex gap-2 scrollbar-thumb-radius-4 scrollbar-width-6 scrollbar-custom',
            'xs' => 'order-2 col-span-3 row-span-1 flex-row overflow-x-auto overflow-y-hidden pb-2 pr-0',
            'sm' =>
                'sm:order-1 sm:col-span-1 sm:row-span-3 sm:flex-col sm:overflow-y-auto sm:overflow-x-hidden sm:pb-0 sm:pr-2',
            'md' =>
                'md:order-2 md:col-span-3 md:row-span-1 md:flex-row md:overflow-x-auto md:overflow-y-hidden md:pb-2 md:pr-0',
            'lg' =>
                'lg:order-1 lg:col-span-1 lg:row-span-3 lg:flex-col lg:overflow-y-auto lg:overflow-x-hidden lg:pb-0 lg:pr-2',
        ],
    ];
@endphp

<section x-data="{
    activeIndex: 0,
    images: [
        @foreach ($product->images as $image) '{{ asset($image->url) }}', @endforeach
    ],
    next() {
        this.activeIndex = (this.activeIndex + 1) % this.images.length;
    },
    prev() {
        this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
    }
}">
    <div class="{{ collect($styles['wrapper'])->implode(' ') }}">
        <figure class="{{ collect($styles['mainImage'])->implode(' ') }}">
            <button
                @click="prev"
                class="{{ collect($styles['mainImageButton'])->implode(' ') }} left-2"
            >
                <x-icons.arrow-left class="size-6" />
            </button>

            <img
                :src="images[activeIndex]"
                alt="{{ $product->name }}"
                class="size-full rounded object-cover shadow-sm"
            >

            <button
                @click="next"
                class="{{ collect($styles['mainImageButton'])->implode(' ') }} right-2"
            >
                <x-icons.arrow-right class="size-6" />
            </button>
        </figure>
        <div class="{{ collect($styles['thumbnails'])->implode(' ') }}">
            @foreach ($product->images as $index => $image)
                <figure class="aspect-square shrink-0">
                    <img
                        src="{{ asset($image->url) }}"
                        @mouseenter="activeIndex = {{ $index }}"
                        alt="{{ $product->name }}"
                        {{-- class="aspect-square size-full cursor-pointer rounded-lg border object-cover shadow-sm" --}}
                        :class="{
                            'aspect-square size-full cursor-pointer rounded-lg border-4 object-cover  shadow-sm': true,
                            'border-gray-300 border-double': activeIndex === {{ $index }},
                            'border-gray-100': activeIndex !== {{ $index }}
                        }"
                    >
                </figure>
            @endforeach
        </div>
    </div>
    <div class="grid grid-cols-4">
        <div class="col-span-3 col-start-2 flex justify-center py-4">
            <template
                x-for="(image, index) in images"
                :key="index"
            >
                <button
                    @mouseenter="activeIndex = index"
                    :class="{
                        'bg-gray-600': activeIndex === index,
                        'bg-gray-300 hover:bg-white': activeIndex !==
                            index
                    }"
                    class="mx-1 h-4 w-4 rounded-full focus:outline-none"
                >
                </button>
            </template>
        </div>
    </div>
</section>
