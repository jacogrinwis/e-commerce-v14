@props(['images'])

<section
    class="image-gallery"
    x-data="{
        activeIndex: 0,
        images: [
            @foreach ($images as $image) '{{ asset($image->url) }}', @endforeach
        ],
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.images.length;
        },
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.images.length) % this.images.length;
        }
    }"
>
    <div class="image-gallery__main">
        <figure>
            <button @click="prev">
                <x-icons.arrow-left />
            </button>
            <img
                :src="images[activeIndex]"
                alt="{{ $image->alt_text }}"
            >
            <button @click="next">
                <x-icons.arrow-right />
            </button>
        </figure>
        <div class="image-gallery__thumbnails">
            @foreach ($images as $index => $image)
                <figure>
                    <img
                        src="{{ asset($image->url) }}"
                        @mouseenter="activeIndex = {{ $index }}"
                        alt="{{ $image->alt_text }}"
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
    <div class="image-gallery__indicators">
        <div>
            <template
                x-for="(image, index) in images"
                :key="index"
            >
                <button
                    @mouseenter="activeIndex = index"
                    :class="{
                        'bg-gray-500': activeIndex === index,
                        'bg-gray-300 hover:bg-white': activeIndex !== index
                    }"
                ></button>
            </template>
        </div>
    </div>
</section>
