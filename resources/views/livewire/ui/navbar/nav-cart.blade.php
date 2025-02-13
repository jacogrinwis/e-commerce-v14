<div>
    <x-navbar.drawer-button dialog-id="cart-drawer">
        <x-icons.cart class="size-6" />
        <livewire:ui.cart.count />
    </x-navbar.drawer-button>

    <x-navbar.drawer-menu
        class="w-sm"
        id="cart-drawer"
        position="right"
        title="Winkelwagen"
    >
        <livewire:ui.cart.overview />
    </x-navbar.drawer-menu>
</div>
