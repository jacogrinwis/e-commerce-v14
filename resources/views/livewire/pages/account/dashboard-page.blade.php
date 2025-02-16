<div class="container grid grid-cols-4 gap-x-16">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>
    @include('livewire.pages.account.partials.menu')
    <main class="col-span-3 space-y-2">
        <h1 class="mb-6 text-2xl font-semibold">Mijn account - Overzicht dashboard</h1>
        <h1>Welkom, {{ $user->name }}</h1>
        <p>Jouw rol: {{ $user->role->value }}</p>
        @if ($user->isAdmin())
            <p>Je bent een admin.</p>
        @elseif ($user->isEditor())
            <p>Je bent een editor.</p>
        @elseif ($user->isUser())
            <p>Je bent een gewone gebruiker.</p>
        @endif
    </main>
</div>
