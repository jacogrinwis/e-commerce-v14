<nav
    class="flex"
    aria-label="Breadcrumb"
>
    <ol class="xspace-x-1 md:xspace-x-2 inline-flex items-center">
        <li class="inline-flex items-center">
            <a
                href="{{ route('home') }}"
                class="inline-flex items-center text-sm font-medium text-gray-900"
            >
                <x-icons.home class="mr-2.5 size-3" />
                Home
            </a>
        </li>

        @foreach ($segments as $segment)
            <li>
                <div class="flex items-center">
                    <x-icons.chevron-right class="mx-1 size-6 text-gray-400" />
                    @if ($segment['url'])
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
