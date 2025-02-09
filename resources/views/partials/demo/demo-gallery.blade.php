{{-- <div class="flex h-[calc(100dvh-8rem)] flex-col gap-4 bg-green-200">

    <div class="flex-grow bg-red-200">
        <figure class="aspect-square bg-purple-200 object-cover">image</figure>
    </div>

    <div class="flex flex-none gap-2 overflow-x-auto bg-blue-200">
        @for ($i = 0; $i < 10; $i++)
            <figure class="aspect-square size-24 bg-amber-200"></figure>
        @endfor
    </div>

</div> --}}


{{-- <div class="flex h-[calc(100dvh-8rem)] flex-col gap-4 bg-green-200">
    <div class="flex-shrink-0 bg-red-200">
        <figure class="h-full w-full bg-purple-200">
            <img
                src="{{ asset('storage/products/images/1.jpg') }}"
                alt="image"
                class="size-fit rounded-sm object-cover shadow-md"
            >
        </figure>
    </div>

    <div class="flex flex-none gap-2 overflow-x-auto bg-blue-200">
        @for ($i = 0; $i < 10; $i++)
            <figure class="aspect-square size-24 bg-amber-200">
                <img
                    src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                    alt="thumbnail-{{ $i }}"
                    class="size-full rounded-sm object-cover shadow-md"
                >
            </figure>
        @endfor
    </div>
</div> --}}



{{-- <div class="flex flex-grow justify-center bg-red-200">
        <figure class="aspect-square size-fit">
            <img
                src="{{ asset('storage/products/images/1.jpg') }}"
                alt="image"
                class="size-fit rounded-sm object-cover shadow-md"
            >
        </figure>
    </div>
    <div class="flex h-24 flex-none justify-center gap-2 bg-blue-200">
        @for ($i = 0; $i < 10; $i++)
            <figure class="aspect-square">
                <img
                    src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                    alt="thumbnail-{{ $i }}"
                    class="size-full rounded-sm object-cover shadow-md"
                >
            </figure>
        @endfor
    </div> --}}


{{-- <div
    id="container"
    class="container mt-24"
>
    <section
        id="gallery"
        class="h-[calc(100dvh-8rem)]"
    >
        <div id="big-image">
            <figure class="aspect-square">
                <img
                    src="{{ asset('storage/products/images/1.jpg') }}"
                    alt="big-image"
                >
            </figure>
        </div>
        <div
            id="thumbnails"
            class="flex gap-2"
        >
            @for ($i = 0; $i < 10; $i++)
                <figure>
                    <img
                        src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                        alt="thumbnail-{{ $i }}"
                        class="size-24 object-cover"
                    >
                </figure>
            @endfor
        </div>
    </section>
</div> --}}


{{-- <section
    id="gallery"
    class="flex h-[calc(100dvh-8rem)] flex-col gap-4"
>
    <div
        id="big-image"
        class="flex-shrink"
    >
        <figure class="aspect-square max-h-full w-fit">
            <img
                src="{{ asset('storage/products/images/1.jpg') }}"
                alt="big-image"
                class="h-full w-auto object-contain"
            >
        </figure>
    </div>

    <div
        id="thumbnails"
        class="flex flex-none gap-2 overflow-x-auto"
    >
        @for ($i = 1; $i < 10; $i++)
            <figure class="flex-none">
                <img
                    src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                    alt="thumbnail-{{ $i }}"
                    class="size-24 object-cover"
                >
            </figure>
        @endfor
    </div>
</section> --}}
{{-- <div class="@container"> --}}
{{-- <div class="xmax-h-[calc(100dvw+6)] flex h-[calc(100dvh-8rem)] flex-col gap-4 bg-red-200">

    <div class="min-h-0 flex-1">
        <figure class="h-full max-h-full max-w-full">
            <img
                src="{{ asset('storage/products/images/1.jpg') }}"
                alt="big-image"
                class="h-full w-full object-contain"
            >
        </figure>
    </div>

    <div class="flex h-24 flex-none gap-2 overflow-x-auto">
        @for ($i = 1; $i < 10; $i++)
            <figure class="flex-none">
                <img
                    src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                    alt="thumbnail-{{ $i }}"
                    class="size-24 object-cover"
                >
            </figure>
        @endfor
    </div>
</div> --}}
{{-- </div> --}}


{{-- <div class="h-[calc(100dvh-8rem)] space-y-4">
    <div class="flex justify-center">
        <figure class="aspect-square size-fit">
            <img
                src="{{ asset('storage/products/images/1.jpg') }}"
                alt="thumbnail-1"
                class="xh-[calc(100dvh-7rem)] object-contain"
            >
        </figure>
    </div>
    <div class="flex h-24 gap-2 overflow-x-auto">
        @for ($i = 1; $i < 10; $i++)
            <figure class="aspect-square">
                <img
                    src="{{ asset('storage/products/images/' . $i . '.jpg') }}"
                    alt="thumbnail-{{ $i }}"
                    class="object-cover"
                >
            </figure>
        @endfor
    </div>
</div> --}}

{{-- <div class="@container h-[500px] w-[300px]">
    <div class="@container-[height>width]:bg-red-500 @container-[width>height]:bg-blue-500">
        Content
    </div>
</div> --}}

{{-- <div class="@container">
    <div class="@container-[height>width]:bg-red-500 @container-[width>height]:bg-blue-500">
        Content
    </div>
</div>

<div class="@container">
    <div class="@[height>width]:bg-red-500 @[width>height]:bg-blue-500">
        Content
    </div>
</div>

<div class="container relative">
    <div class="portrait:bg-red-500 landscape:bg-blue-500">
        Content
    </div>
</div> --}}



<div class="my-container">
    <div class="container-content">
        Contenttest
    </div>
</div>
