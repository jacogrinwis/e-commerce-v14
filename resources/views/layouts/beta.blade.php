<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <script type="module">
        if (!("anchorName" in document.documentElement.style)) {
            import("https://unpkg.com/@oddbird/css-anchor-positioning");
        }
    </script>
</head>

<body class="pt-20">
    <x-navbar.navbar>
        <div class="flex items-center gap-4">

        </div>
        <div class="flex items-center gap-2">

            @guest
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
                    <p class="mb-4 text-sm">Nog geen account? Hieronder kun je makkelijk een account aanmaken.</p>
                    <button
                        class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-black"
                    >
                        Account aanmaken
                    </button>
                </x-navbar.drawer-menu>
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
                        <li><a
                                href="#"
                                wire:navigate
                                class="block px-4 py-2 hover:bg-gray-100"
                            >Overzicht dashboard</a></li>
                        <li><a
                                href="#"
                                wire:navigate
                                class="block px-4 py-2 hover:bg-gray-100"
                            >Gegevens</a></li>
                        <li><a
                                href="#"
                                wire:navigate
                                class="block px-4 py-2 hover:bg-gray-100"
                            >Bestellingen</a></li>
                        <li><a
                                href="#"
                                wire:navigate
                                class="block px-4 py-2 hover:bg-gray-100"
                            >Verlanglijstje</a></li>
                    </ul>
                    <div class="py-2">
                        <a
                            href="#"
                            wire:navigate
                            class="block px-4 py-2 hover:bg-gray-100"
                        >Geplaaste reviews</a>
                    </div>
                    <div class="py-2">
                        <livewire:ui.auth.logout />
                    </div>
                </x-navbar.dropdown-menu>
            @endauth

            <x-navbar.button-link href="{{ route('wishlist') }}">
                <x-icons.solid.hart class="size-5" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    1
                </x-navbar.button-badge>
            </x-navbar.button-link>

            <x-navbar.drawer-button dialog-id="cart-drawer">
                <x-icons.cart class="size-6" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    999
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                class="w-sm"
                id="cart-drawer"
                position="right"
            >
                top drawer
            </x-navbar.drawer-menu>

            {{-- <x-navbar.dropdown-button dropdown-name="cart-menu">
                <x-icons.cart class="size-6" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    999
                </x-navbar.button-badge>
            </x-navbar.dropdown-button>
            <x-navbar.dropdown-menu dropdown-name="cart-menu">
                cart menu
            </x-navbar.dropdown-menu> --}}

            {{-- <x-navbar.dropdown-button dropdown-name="user-menu">
                <x-icons.user class="size-6" />
            </x-navbar.dropdown-button>
            <x-navbar.dropdown-menu dropdown-name="user-menu">
                user menu
            </x-navbar.dropdown-menu> --}}

            {{-- <x-navbar.drawer-button name="right-drawer">
                <x-icons.home class="size-4" />
                <x-navbar.button-badge class="size-4 bg-purple-500">
                    <x-icons.check class="size-4 p-0" />
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                class="w-64"
                name="right-drawer"
                position="right"
            >
                right drawer
            </x-navbar.drawer-menu> --}}

            {{-- <x-navbar.drawer-button name="top-drawer">
                <x-icons.home class="size-4" />
                <x-navbar.button-badge class="size-4 bg-red-500">
                    <x-icons.check class="size-4 p-0" />
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                name="top-drawer"
                position="top"
            >
                top drawer
            </x-navbar.drawer-menu> --}}

            {{-- <x-navbar.drawer-button name="bottom-drawer">
                <x-icons.home class="size-4" />
                <x-navbar.button-badge class="size-4 bg-orange-500">
                    <x-icons.check class="size-4 p-0" />
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                name="bottom-drawer"
                position="bottom"
            >
                bottom drawer
            </x-navbar.drawer-menu> --}}

            {{-- <x-navbar.drawer-button name="bottom2-drawer">
                <x-icons.home class="size-4" />
                <x-navbar.button-badge class="size-4 bg-blue-500">
                    <x-icons.check class="size-4 p-0" />
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                class="h-[calc(100dvh-100px)]"
                name="bottom2-drawer"
                position="bottom"
            >
                bottom drawer
            </x-navbar.drawer-menu> --}}

            {{-- <x-navbar.drawer-button name="standard-drawer">
                <x-icons.home class="size-4" />
                <x-navbar.button-badge class="size-4 bg-yellow-500">
                    <x-icons.check class="size-4 p-0" />
                </x-navbar.button-badge>
            </x-navbar.drawer-button>
            <x-navbar.drawer-menu
                class="w-130"
                name="standard-drawer"
            >
                bottom drawer
            </x-navbar.drawer-menu> --}}

            {{-- <x-navbar.dropdown-button dropdown-name="favorites-menu">
                <x-icons.solid.hart class="size-5" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    1
                </x-navbar.button-badge>
            </x-navbar.dropdown-button>
            <x-navbar.dropdown-menu dropdown-name="favorites-menu">
                favorites menu
            </x-navbar.dropdown-menu> --}}

            {{-- <x-navbar.dropdown-button dropdown-name="cart-menu">
                <x-icons.cart class="size-6" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    999
                </x-navbar.button-badge>
            </x-navbar.dropdown-button>
            <x-navbar.dropdown-menu dropdown-name="cart-menu">
                cart menu
            </x-navbar.dropdown-menu> --}}

            {{-- <x-navbar.button-link href="{{ route('wishlist') }}">
                <x-icons.solid.hart class="size-5" />
                <x-navbar.button-badge class="bg-red-500 px-1">
                    1
                </x-navbar.button-badge>
            </x-navbar.button-link> --}}
        </div>
    </x-navbar.navbar>

    {{ $slot }}

    @livewireScripts
</body>

</html>
