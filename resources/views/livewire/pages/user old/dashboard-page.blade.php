<div class="container">
    <div class="mb-6">
        <x-breadcrumb />
    </div>
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
