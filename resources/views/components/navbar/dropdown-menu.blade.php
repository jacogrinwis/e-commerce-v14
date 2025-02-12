@php
    $dialogClasses =
        'transition-discrete starting:open:opacity-0 custom-shadow mt-1 rounded-md bg-white min-w-48 opacity-0 transition-all duration-300 open:opacity-100';
@endphp

<dialog
    id="{{ $dropdownName }}"
    {{ $attributes->merge(['class' => $dialogClasses]) }}
    style="inset: auto; position-anchor: --{{ $dropdownName }}; top: anchor(bottom); right: anchor(right);"
    popover
>
    {{ $slot }}
</dialog>
