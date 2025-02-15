<button
    wire:click="toggleFavorite"
    class="group inline-flex size-10 items-center justify-center rounded-md text-lg font-semibold transition-all duration-300"
>
    <x-icons.solid.hart
        class="{{ $isFavorited ? 'stroke-transparent fill-red-500' : 'stroke-gray-300 fill-white hover:fill-red-500 hover:stroke-transparent' }} xstroke-2 size-7"
    />
</button>
