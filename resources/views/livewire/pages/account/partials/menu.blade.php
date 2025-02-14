<aside class="rounded-md border border-gray-200">
    <h2 class="px-4 pt-4 text-lg font-semibold">Mijn account</h2>
    <div class="divide-y divide-gray-100 text-sm text-gray-700">
        <ul class="py-2">
            <li><a
                    href="{{ route('account.dashboard') }}"
                    class="block px-4 py-2 hover:bg-gray-100"
                >Overzicht dashboard</a></li>
            <li><a
                    href="{{ route('account.details') }}"
                    class="block px-4 py-2 hover:bg-gray-100"
                >Accountgegevens</a></li>
            <li><a
                    href="{{ route('account.orders') }}"
                    class="block px-4 py-2 hover:bg-gray-100"
                >Mijn bestellingen</a></li>
            <li><a
                    href="{{ route('account.favorites') }}"
                    class="block px-4 py-2 hover:bg-gray-100"
                >Verlanglijstje</a></li>
        </ul>
        <div class="py-2"><a
                href="{{ route('account.reviews') }}"
                class="block px-4 py-2 hover:bg-gray-100"
            >Geplaatste reviews</a></div>
        <div class="py-2"><a
                href="{{ route('logout') }}"
                class="block px-4 py-2 hover:bg-gray-100"
            >Uitloggen</a></div>
    </div>
</aside>
