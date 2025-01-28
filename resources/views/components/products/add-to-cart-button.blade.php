@props(['id', 'disabled' => false])

<button
    type="button"
    x-data
    class="{{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }} group relative h-10 w-16 overflow-hidden rounded bg-red-600 font-medium text-white transition-all duration-300 ease-in-out focus:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800"
    @click="$el.focus(); setTimeout(() => $el.blur(), 2000)"
    wire:click="addToCart({{ $id }})"
    {{ $disabled ? 'disabled' : '' }}
>
    <span
        class="absolute inset-0 flex -translate-x-full items-center justify-center px-2 py-2.5 opacity-0 transition-all duration-1000 group-focus:translate-x-0 group-focus:opacity-100"
    >
        <x-icons.check2 class="text-white dark:text-white" />
    </span>
    <span
        class="absolute inset-0 flex transform items-center justify-center px-2 py-2.5 opacity-100 transition-all duration-1000 group-focus:translate-x-full group-focus:opacity-0"
    >
        <x-icons.plus2 class="size-5 text-white dark:text-white" />
        <x-icons.cart2 class="size-5 text-white dark:text-white" />
    </span>
</button>
