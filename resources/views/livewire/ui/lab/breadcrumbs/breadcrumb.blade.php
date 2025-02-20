<div>
    @php

    @endphp
    <ul class="flex items-center gap-1 text-sm font-semibold">
        <li class="flex items-center">
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-2 text-gray-500 underline hover:no-underline"
            >
                <x-icons.home class="size-4" />
                Home
            </a>
        </li>
        @foreach ($trails as $trail)
            <li class="flex items-center gap-1">
                <x-icons.arrow-right class="size-4 text-gray-400" />
                @if ($trail['url'])
                    <a
                        href="{{ $trail['url'] }}"
                        class="{{ $loop->last ? 'text-gray-700' : 'text-gray-500' }} underline hover:no-underline"
                    >
                        {{ $trail['label'] }}
                    </a>
                @else
                    <span class="{{ $loop->last ? 'text-gray-700' : 'text-gray-500' }}">
                        {{ $trail['label'] }}
                    </span>
                @endif
            </li>
        @endforeach
    </ul>
</div>
