<div class="container grid grid-cols-4 gap-x-16">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>

    @include('livewire.pages.account.partials.menu')

    <main class="col-span-3 space-y-6">
        <h1 class="text-2xl font-semibold">Accountgegevens</h1>

        @if (session('success'))
            <div class="rounded-md bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-md border border-gray-200 bg-white p-6 shadow">
            <h2 class="mb-4 text-xl font-semibold">Profiel bijwerken</h2>

            <form wire:submit="updateProfile">
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
                        >Email</label>
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
                </div>

                <button
                    type="submit"
                    class="btn btn-primary mt-6"
                >
                    Profiel opslaan
                </button>
            </form>
        </div>

        <div class="rounded-md border border-gray-200 bg-white p-6 shadow">
            <h2 class="mb-4 text-xl font-semibold">Wachtwoord wijzigen</h2>

            <form wire:submit="updatePassword">
                <div class="space-y-4">
                    <div>
                        <label
                            for="current_password"
                            class="mb-1 block text-sm font-medium"
                        >Huidig wachtwoord</label>
                        <input
                            type="password"
                            wire:model="current_password"
                            id="current_password"
                            class="input-text w-full"
                        >
                        @error('current_password')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="new_password"
                            class="mb-1 block text-sm font-medium"
                        >Nieuw wachtwoord</label>
                        <input
                            type="password"
                            wire:model="new_password"
                            id="new_password"
                            class="input-text w-full"
                        >
                        @error('new_password')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label
                            for="new_password_confirmation"
                            class="mb-1 block text-sm font-medium"
                        >Bevestig nieuw wachtwoord</label>
                        <input
                            type="password"
                            wire:model="new_password_confirmation"
                            id="new_password_confirmation"
                            class="input-text w-full"
                        >
                    </div>
                </div>

                <button
                    type="submit"
                    class="btn btn-primary mt-6"
                >
                    Wachtwoord wijzigen
                </button>
            </form>
        </div>
    </main>
</div>
