<div class="container">
    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-full">
            <h4 class="text-2xl font-semibold">Inloggen of een account aanmaken</h4>
        </div>
        <div>
            <h5 class="mb-4 text-xl font-semibold">Nieuw hier?</h5>
            <p class="pb-4 text-sm text-gray-500">
                Nog geen account? Hieronder kun je makkelijk een account aanmaken.
            </p>
            <button
                class="flex w-full items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-black"
            >
                Account aanmaken
            </button>
        </div>
        <div class="rounded-md border border-gray-200 p-4">
            <h5 class="mb-4 text-xl font-semibold">Al geregistreerd?</h5>
            <livewire:ui.auth.login />
        </div>
    </div>
</div>
