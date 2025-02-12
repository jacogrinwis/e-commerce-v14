@php
    $basicClasses =
        'transition-discrete duration-300 starting:open:backdrop:opacity-0 backdrop:transition-discrete backdrop:duration-300 bg-white p-4 transition-all backdrop:bg-gray-900/50 backdrop:opacity-0 backdrop:transition-all open:backdrop:opacity-100 ';

    $positionClasses = [
        'left' =>
            '-translate-x-full starting:open:-translate-x-full open:translate-x-0 mr-auto inset-inline-start-0 inset-block-0 min-h-[100dvh]',
        'right' =>
            'translate-x-full starting:open:translate-x-full open:translate-x-0 ml-auto inset-inline-end-0 inset-block-0 min-h-[100dvh]',
        'top' =>
            '-translate-y-full starting:open:-translate-y-full open:-translate-y-0 mb-auto inset-block-end-0 inset-inline-0 min-w-[100dvw]',
        'bottom' =>
            'translate-y-full starting:open:translate-y-full open:translate-y-0 mt-auto inset-block-end-0 inset-inline-0 min-w-[100dvw]',
    ];
@endphp

<dialog
    id="{{ $id }}"
    {{ $attributes->merge(['class' => $basicClasses . ' ' . $positionClasses[$position]]) }}
>
    <header class="mb-4 flex items-center justify-between">
        <h2 class="text-lg font-semibold">{{ $title ?? '' }}</h2>
        <button
            class="inline-flex size-10 items-center justify-center rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200"
            data-drawer-close
        >
            <x-icons.close class="size-6" />
        </button>
    </header>

    {{ $slot }}
</dialog>
