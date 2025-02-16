<aside class="h-fit rounded-md border border-gray-200 shadow-sm">
    <h2 class="px-6 pt-4 text-xl font-semibold">Mijn account</h2>
    <div class="divide-y divide-gray-100 px-2 text-sm text-gray-700">
        <div class="px-4 py-3 text-gray-900">
            <div>{{ auth()->user()->name }}</div>
            <div class="truncate font-semibold">{{ auth()->user()->email }}</div>
        </div>
        <ul class="py-2">
            <li><a
                    href="{{ route('account.dashboard') }}"
                    class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
                >
                    <x-icons.gauge class="h-3.5 w-4" />
                    Overzicht dashboard
                </a>
            </li>
            <li><a
                    href="{{ route('account.details') }}"
                    class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
                >
                    <x-icons.user-circle class="h-4 w-4" />
                    Accountgegevens
                </a>
            </li>
            <li><a
                    href="{{ route('account.orders') }}"
                    class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
                >
                    <x-icons.truck class="h-4 w-4" />
                    Mijn bestellingen
                </a>
            </li>
            <li><a
                    href="{{ route('account.favorites') }}"
                    class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
                >
                    <x-icons.hart class="h-4 w-4 fill-black" />
                    Verlanglijstje
                </a>
            </li>
            <li><a
                    href="{{ route('account.address-book') }}"
                    class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
                >
                    <x-icons.address-book class="h-4 w-4 fill-black" />
                    Adresboek
                </a>
            </li>
        </ul>
        <div class="py-2"><a
                href="{{ route('account.reviews') }}"
                class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
            >
                <x-icons.star class="h-4 w-4" />
                Geplaatste reviews
            </a>
        </div>
        <div class="py-2"><a
                href="{{ route('logout') }}"
                class="flex items-center gap-3 rounded-sm px-4 py-2 hover:bg-gray-100"
            >
                <x-icons.lock class="h-4 w-4" />
                Uitloggen
            </a>
        </div>
    </div>
</aside>
