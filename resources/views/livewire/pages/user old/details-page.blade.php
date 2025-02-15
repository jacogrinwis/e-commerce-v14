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

        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                        @error('email')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button
                    type="submit"
                    class="mt-6 rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Profiel opslaan
                </button>
            </form>
        </div>

        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
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
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>
                </div>

                <button
                    type="submit"
                    class="mt-6 rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Wachtwoord wijzigen
                </button>
            </form>
        </div>
    </main>
</div>
