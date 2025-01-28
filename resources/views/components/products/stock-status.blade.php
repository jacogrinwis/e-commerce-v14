{{-- 'in_stock', 'low_stock', 'out_of_stock', 'coming_soon' --}}

@if ($status === 'in_stock')
    <span
        class="inline-flex items-center gap-1 rounded bg-green-100 px-2.5 py-0.5 text-xs font-bold text-green-800 dark:bg-green-900 dark:text-green-300"
    >
        <x-icons.check class="size-3" />
        Op voorraad
    </span>
@elseif ($status === 'coming_soon')
    <span class="rounded bg-blue-100 px-2.5 py-0.5 text-xs font-bold text-blue-800 dark:bg-blue-900 dark:text-blue-300">
        Binnenkort leverbaar
    </span>
@elseif ($status === 'low_stock')
    <span class="rounded bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-800 dark:bg-red-900 dark:text-red-300">
        Bijna uitverkocht
    </span>
@elseif ($status === 'out_of_stock')
    <span class="rounded bg-red-100 px-2.5 py-0.5 text-xs font-bold text-red-800 dark:bg-red-900 dark:text-red-300">
        Uitverkocht
    </span>
@endif
