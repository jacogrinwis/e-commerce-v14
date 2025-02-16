<div class="container">
    <div class="grid grid-cols-2 gap-x-16">
        <div class="col-span-full">
            <h4 class="mb-4 text-2xl font-semibold">Inloggen of een account aanmaken</h4>
        </div>
        <div>
            <h5 class="mb-4 text-xl font-semibold">Nieuw hier?</h5>
            <p class="pb-4 text-sm text-gray-500">
                Nog geen account? Hieronder kun je makkelijk een account aanmaken.
            </p>
            <a
                href="{{ route('auth.register') }}"
                class="btn btn-secondary block text-center"
            >Account aanmaken</a>
        </div>
        <div class="rounded-md border border-gray-200 p-6 shadow">
            <h5 class="mb-4 text-xl font-semibold">Al geregistreerd?</h5>
            <livewire:ui.auth.login />
        </div>
    </div>
</div>
