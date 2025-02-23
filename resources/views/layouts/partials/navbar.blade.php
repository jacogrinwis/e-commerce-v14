<nav class="backdrop-blur-xs fixed start-0 top-0 z-50 w-full border-b border-gray-200 bg-white/90">
    <div class="h-18 container flex justify-between p-4">
        {{-- <div>
            <a
                href="{{ route('home') }}"
                class="text-lg font-semibold"
            >Agathe Grinwis</a>
        </div> --}}
        <div class="flex items-center gap-4">
            <a
                href="{{ route('home') }}"
                class="mr-16 text-lg font-semibold"
            >Agathe Grinwis</a>
            <livewire:ui.navbar.nav-global-links />
        </div>
        <div class="flex items-center gap-2">
            <livewire:ui.navbar.nav-auth />
            <livewire:ui.navbar.nav-favorites />
            <livewire:ui.navbar.nav-cart />
        </div>
    </div>
</nav>
