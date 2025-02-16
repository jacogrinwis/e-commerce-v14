<div class="container max-w-xl">
    {{-- <div class="mb-6">
        <x-breadcrumb />
    </div> --}}

    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
        <h1 class="mb-4 text-2xl font-semibold">Account aanmaken</h1>
        <p class="mb-4 text-sm text-gray-500">Vul de volgende gegevens in om een account aan te maken.</p>

        <form wire:submit="register">
            <div class="space-y-4">
                <div>
                    <label
                        for="name"
                        class="mb-1 block text-sm font-medium"
                    >Naam</label>
                    <input
                        type="text"
                        wire:model="name"
                        id="name"
                        class="input-text w-full"
                    >
                    @error('name')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label
                        for="email"
                        class="mb-1 block text-sm font-medium"
                    >E-mailadres</label>
                    <input
                        type="email"
                        wire:model="email"
                        id="email"
                        class="input-text w-full"
                    >
                    @error('email')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label
                        for="password"
                        class="mb-1 block text-sm font-medium"
                    >Wachtwoord</label>
                    <input
                        type="password"
                        wire:model="password"
                        id="password"
                        class="input-text w-full"
                    >
                    @error('password')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label
                        for="password_confirmation"
                        class="mb-1 block text-sm font-medium"
                    >Bevestig wachtwoord</label>
                    <input
                        type="password"
                        wire:model="password_confirmation"
                        id="password_confirmation"
                        class="input-text w-full"
                    >
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-primary mt-6 w-full"
            >
                Registreren
            </button>
        </form>

        <p class="mt-4 text-center text-sm text-gray-600">
            Heb je al een account?
            <a
                href="{{ route('auth.login') }}"
                class="text-blue-600 hover:underline"
            >
                Inloggen
            </a>
        </p>
    </div>
</div>
