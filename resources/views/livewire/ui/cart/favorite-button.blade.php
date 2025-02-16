<button
    wire:click="toggleFavorite"
    class="inline-flex items-center gap-1 text-sm text-gray-500 hover:underline"
>
    <x-icons.hart class="{{ $isFavorited ? 'stroke-0 fill-red-500' : 'stroke-gray-500' }} size-4" />
    {{ $isFavorited ? 'Verwijder favoriet' : 'Bewaar voor later' }}
</button>
