<div class="container">


    {{-- <a
        href="/"
        wire:navigate.prevent
        wire:navigate
        wire:click.self
        class="size-94 relative block bg-gray-100 p-16"
    >
        <figure>
            <button
                x-data
                @click.stop
                onclick="event.preventDefault(); event.stopPropagation();"
                wire:click=""
                type="button"
                class="absolute right-2 top-2 inline-flex items-center justify-center bg-black p-4 text-white"
            >
                click
            </button>
        </figure>

    </a> --}}

    <div class="relative max-w-sm">
        <a
            href="/"
            wire:navigate
        >
            <img
                src="{{ asset('/products/covers/29.jpg') }}"
                alt=""
                class="aspect-square w-full object-cover"
            >
        </a>

        <div class="absolute bottom-2 left-2">
            <span class="inline-block size-5 rounded-full bg-teal-500 shadow-sm"></span>
            <span class="inline-block size-5 rounded-full bg-neutral-500 shadow-sm"></span>
            <span class="inline-block size-5 rounded-full bg-yellow-500 shadow-sm"></span>
        </div>

        <button
            type="button"
            class="absolute right-4 top-4 inline-flex size-10 cursor-pointer items-center justify-center"
        >
            <x-icons.hart class="size-8 fill-red-500 stroke-gray-500" />
        </button>
    </div>

</div>
