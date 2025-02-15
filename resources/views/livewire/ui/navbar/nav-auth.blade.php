<div>
    @guest
        <div wire:ignore>
            <x-navbar.drawer-button dialog-id="user-drawer">
                <x-icons.user class="size-6" />
                Aanmelden
            </x-navbar.drawer-button>

            <x-navbar.drawer-menu
                class="w-sm"
                id="user-drawer"
                position="right"
                title="Inloggen of registreren"
            >
                <livewire:ui.auth.login />
                <hr class="my-4 h-px border-0 bg-gray-200">
                <p class="mb-4 text-sm text-gray-500">Nog geen account? Hieronder kun je makkelijk een account aanmaken.</p>
                <button
                    class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-black"
                >
                    Account aanmaken
                </button>
            </x-navbar.drawer-menu>
        </div>
    @endguest

    @auth
        <x-navbar.dropdown-button dropdown-name="user-menu">
            <x-icons.user class="size-6" />
            <x-navbar.button-badge class="left-6 size-4 bg-green-500">
                <x-icons.check class="size-4 p-0" />
            </x-navbar.button-badge>
            {{ auth()->user()->name }}
            <x-icons.chevron-down class="size-3" />
        </x-navbar.dropdown-button>

        <x-navbar.dropdown-menu
            dropdown-name="user-menu"
            class="w-fit divide-y divide-gray-100 text-sm text-gray-700"
        >
            <div class="px-4 py-3 text-gray-900">
                <div>{{ auth()->user()->name }}</div>
                <div class="truncate font-semibold">{{ auth()->user()->email }}</div>
            </div>
            <ul class="py-2">
                <li>
                    <a
                        href="{{ route('account.dashboard') }}"
                        wire:navigate
                        class="block px-4 py-2 hover:bg-gray-100"
                    >
                        Overzicht dashboard
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.details') }}"
                        wire:navigate
                        class="block px-4 py-2 hover:bg-gray-100"
                    >
                        Accountgegevens
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.orders') }}"
                        wire:navigate
                        class="block px-4 py-2 hover:bg-gray-100"
                    >
                        Mijn bestellingen
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.favorites') }}"
                        wire:navigate
                        class="block px-4 py-2 hover:bg-gray-100"
                    >
                        Verlanglijstje
                    </a>
                </li>
            </ul>
            <div class="py-2">
                <a
                    href="{{ route('account.reviews') }}"
                    wire:navigate
                    class="block px-4 py-2 hover:bg-gray-100"
                >
                    Geplaaste reviews
                </a>
            </div>
            <div class="py-2">
                <livewire:ui.auth.logout />
            </div>
        </x-navbar.dropdown-menu>
    @endauth
</div>
