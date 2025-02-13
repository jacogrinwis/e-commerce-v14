<div class="container">
    <h1>Welkom, {{ $user->name }}</h1>
    <p>Jouw rol: {{ $user->role->value }}</p>

    @if ($user->isAdmin())
        <p>Je bent een admin.</p>
    @elseif ($user->isEditor())
        <p>Je bent een editor.</p>
    @elseif ($user->isUser())
        <p>Je bent een gewone gebruiker.</p>
    @endif
</div>
