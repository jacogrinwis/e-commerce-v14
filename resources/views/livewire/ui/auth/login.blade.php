{{-- <div class="flex h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg"> --}}
<div>
    <h2 class="mb-4 text-center text-2xl font-bold">Login</h2>

    @if (session()->has('message'))
        <div class="mb-4 rounded bg-red-500 p-2 text-white">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="login">
        <div class="mb-4">
            <label
                for="email"
                class="block text-gray-700"
            >E-mail</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="w-full rounded border p-2"
            >
            @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label
                for="password"
                class="block text-gray-700"
            >Wachtwoord</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                class="w-full rounded border p-2"
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
                class="mr-2"
            >
            <label
                for="remember"
                class="text-gray-700"
            >Onthoud mij</label>
        </div>

        <button
            type="submit"
            class="w-full rounded bg-blue-500 py-2 text-white hover:bg-blue-600"
        >Login</button>
    </form>
</div>
{{-- </div>
</div> --}}
