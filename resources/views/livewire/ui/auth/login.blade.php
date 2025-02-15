<div>
    @if (session()->has('message'))
        <div class="mb-4 rounded bg-red-500 p-2 text-white">{{ session('message') }}</div>
    @endif

    <form
        wire:submit="login"
        method="POST"
    >
        <p class="mb-4 text-sm text-gray-500">Heb je al een account? Log hieronder in.</p>
        <div class="mb-4">
            <label
                for="email"
                class="input-label mb-2 block"
            >E-mailadres</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="input-text w-full"
            >
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label
                for="password"
                class="input-label mb-2 block"
            >Wachtwoord</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                class="input-text w-full"
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
                class="input-checkbox"
            >
            <label
                for="remember"
                class="input-label ms-2"
            >Onthoud mij</label>
        </div>

        <button
            type="submit"
            class="btn btn-primary w-full"
        >Inloggen</button>
    </form>
</div>
