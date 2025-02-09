@props(['type'])

@php
    $classes = match ($type) {
        'success' => 'success-alert',
        'info' => 'info-alert',
        'dark' => 'dark-alert',
        default => 'info-alert',
    };
@endphp

<p
    x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="timeout = setTimeout(() => {
        show = false;
    }, 2000)"
    class="{{ $classes }}"
>
    {{ $slot }}
</p>
