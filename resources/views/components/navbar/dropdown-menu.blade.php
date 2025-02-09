<dialog
    id="{{ $dropdownName }}"
    class="transition-discrete starting:open:opacity-0 custom-shadow mt-1 w-[calc(100%-2rem)] rounded-md bg-white p-4 opacity-0 transition-all duration-300 open:opacity-100 sm:w-96"
    style="inset: auto; position-anchor: --{{ $dropdownName }}; top: anchor(bottom); right: anchor(right);"
    popover
>
    {{ $slot }}
</dialog>
