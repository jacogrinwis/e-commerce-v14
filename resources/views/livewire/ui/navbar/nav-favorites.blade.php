<div>
    <x-navbar.button-link href="{{ route('account.favorites') }}">
        <x-icons.solid.hart class="size-5" />
        @if ($favoriteCount > 0)
            <x-navbar.button-badge class="bg-red-500 px-1">
                {{ $favoriteCount }}
            </x-navbar.button-badge>
        @endif
    </x-navbar.button-link>
</div>
