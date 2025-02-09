<nav
    class="flex"
    aria-label="Breadcrumb"
>
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <li class="inline-flex items-center">
            <a
                href="/"
                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600"
            >
                <x-icons.home class="mr-2.5 size-4" />
                Home
            </a>
        </li>

        @foreach ($segments as $segment)
            <li>
                <div class="flex items-center">
                    <x-icons.chevron-right class="mx-1 size-4 text-gray-400" />
                    @if (!$loop->last)
                        <a
                            href="{{ $segment['url'] }}"
                            class="text-sm font-medium text-gray-700 hover:text-red-600"
                        >
                            {{ $segment['label'] }}
                        </a>
                    @else
                        <span class="text-sm font-medium text-gray-500">
                            {{ $segment['label'] }}
                        </span>
                    @endif
                </div>
            </li>
        @endforeach
    </ol>
</nav>
