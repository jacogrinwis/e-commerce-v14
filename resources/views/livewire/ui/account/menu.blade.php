<aside>
    <h2>Menu account</h2>
    <ul>
        <li><a href="{{ route('account.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('account.details') }}">Accountgegevens</a></li>
        <li><a href="{{ route('account.orders') }}">Mijn bestellingen</a></li>
        <li><a href="{{ route('account.favorites') }}">Verlanglijstje</a></li>
        <li>
            <laravel:ui.auth.logout />
        </li>
    </ul>
</aside>
