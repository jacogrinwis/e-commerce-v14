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
            <div class="px-6 pb-3 pt-4 text-gray-900">
                <div>{{ auth()->user()->name }}</div>
                <div class="truncate font-semibold">{{ auth()->user()->email }}</div>
            </div>
            <ul class="py-2">
                <li>
                    <a
                        href="{{ route('account.dashboard') }}"
                        wire:navigate
                        class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                    >
                        <x-icons.gauge class="h-3.5 w-4" />
                        Overzicht dashboard
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.details') }}"
                        wire:navigate
                        class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                    >
                        <x-icons.user-circle class="h-4 w-4" />
                        Accountgegevens
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.orders') }}"
                        wire:navigate
                        class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                    >
                        <x-icons.truck class="h-4 w-4" />
                        Mijn bestellingen
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('account.favorites') }}"
                        wire:navigate
                        class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                    >
                        <x-icons.hart class="h-4 w-4 fill-black" />
                        Verlanglijstje
                    </a>
                </li>
                <li><a
                        href="{{ route('account.address-book') }}"
                        class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                    >
                        <x-icons.address-book class="h-4 w-4 fill-black" />
                        Adresboek
                    </a>
                </li>
            </ul>
            <div class="py-2">
                <a
                    href="{{ route('account.reviews') }}"
                    wire:navigate
                    class="flex items-center gap-3 px-6 py-2 hover:bg-gray-100"
                >
                    <x-icons.star class="h-4 w-4" />
                    Geplaaste reviews
                </a>
            </div>
            <div class="py-2">
                <livewire:ui.auth.logout />
            </div>
        </x-navbar.dropdown-menu>
    @endauth
</div>
