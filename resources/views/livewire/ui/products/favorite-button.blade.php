{{-- <button
    wire:click="toggleFavorite"
    class="{{ $isFavorited ? 'bg-red-100 text-red-600' : 'bg-gray-100' }} flex items-center gap-2 rounded-lg px-4 py-2"
>
    <svg
        class="h-5 w-5"
        fill="{{ $isFavorited ? 'currentColor' : 'none' }}"
        stroke="currentColor"
        viewBox="0 0 24 24"
    >
        <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
        />
    </svg>
    {{ $isFavorited ? 'Favoriet' : 'Voeg toe aan favorieten' }}
</button> --}}


<button
    wire:click="toggleFavorite"
    class="group inline-flex size-10 items-center justify-center rounded-md text-lg font-semibold transition-all duration-300"
>
    <x-icons.solid.hart
        class="{{ $isFavorited ? 'stroke-transparent fill-red-500' : 'stroke-gray-300 fill-white hover:fill-red-500 hover:stroke-transparent' }} xstroke-2 size-7"
    />
</button>
