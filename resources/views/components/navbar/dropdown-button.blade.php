<button
    class="relative inline-flex h-10 min-w-10 items-center justify-center gap-1 rounded-md px-2 text-sm font-semibold hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200"
    style="anchor-name: --{{ $dropdownName }}"
    popovertarget="{{ $dropdownName }}"
>
    {{ $slot }}
</button>
