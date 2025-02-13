<div>
    @if (session()->has('message'))
        <div class="mb-4 rounded bg-red-500 p-2 text-white">{{ session('message') }}</div>
    @endif

    <form
        wire:submit="login"
        method="POST"
    >
        <p class="mb-4 text-sm">Heb je al een account? Log hieronder in.</p>
        <div class="mb-4">
            <label
                for="email"
                class="mb-2 block text-sm font-medium text-gray-900"
            >E-mailadres</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
            >
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label
                for="password"
                class="mb-2 block text-sm font-medium text-gray-900"
            >Wachtwoord</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
            >
            @error('password')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4 flex items-center">
            <input
                type="checkbox"
                id="remember"
                wire:model="remember"
                class="h-4 w-4 rounded-sm border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:ring-offset-gray-800 dark:focus:ring-blue-600"
            >
            <label
                for="remember"
                class="ms-2 text-sm font-medium text-gray-900"
            >Onthoud mij</label>
        </div>

        <button
            type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-lg bg-black px-5 py-2.5 text-sm font-medium text-white"
        >Inloggen</button>
    </form>
</div>
