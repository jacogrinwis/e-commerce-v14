<div class="container max-w-5xl">
    <div class="grid grid-cols-2 gap-x-16">
        <div class="col-span-full">
            <h4 class="mb-4 text-2xl font-semibold">Inloggen of een account aanmaken</h4>
        </div>
        <div class="shadow-xs h-fit rounded-md border border-gray-200 p-6">
            <h5 class="mb-1 text-xl font-semibold">Al geregistreerd?</h5>
            <livewire:ui.auth.login />
        </div>
        <div class="space-y-16">
            <div class="rounded-md bg-gray-50 p-6">
                <h5 class="mb-1 text-xl font-semibold">Nieuw hier?</h5>
                <p class="pb-4 text-sm text-gray-500">
                    Maak een account aan voor de beste shopping experience.
                </p>
                <h6 class="mb-1 text-lg font-semibold">Voordelen van een account</h6>
                <ul class="mb-4 list-inside list-disc text-sm text-gray-500">
                    <li>Snel en eenvoudig bestellen</li>
                    <li>Eenvoudig beheren van adresgegevens</li>
                    <li>Persoonlijk verlanglijstje bijhouden</li>
                    <li>Snel kunnen inzien van je facturen</li>
                </ul>
                <a
                    href="{{ route('auth.register') }}"
                    class="btn btn-primary block text-center"
                >Account aanmaken</a>
            </div>
            <div>
                <h5 class="mb-1 text-xl font-semibold">Bestellen zonder account</h5>
                <p class="mb-6 text-sm text-gray-500">Je kan jouw bestelling ook afronden zonder account</p>
                <a
                    href="#"
                    class="btn btn-secondary block text-center text-black"
                >Doorgaan zonder registratie</a>
            </div>
        </div>
    </div>
</div>
