<div>
    <div>
        <h2 class="mb-4 text-xl font-bold">Personal Information</h2>
        <p class="mb-4 text-sm text-gray-500">Shipping & billing info</p>

        <div class="space-y-4">
            <div>
                <label class="input-label mb-1 block">Name</label>
                <input
                    type="text"
                    wire:model.live="name"
                    class="input-text w-full"
                >
            </div>

            <div>
                <label class="input-label mb-1 block">Email</label>
                <input
                    type="email"
                    wire:model.live="email"
                    class="input-text w-full"
                >
            </div>
            {{-- <div>
                <label class="input-label mb-1 block">Gender</label>
                <div class="flex">
                    <div class="me-4 flex items-center">
                        <input
                            type="radio"
                            wire:model.live="gender"
                            value="men"
                            class="input-radio me-2"
                        >
                        <label class="input-label block">Men</label>
                    </div>
                    <div class="me-4 flex items-center">
                        <input
                            type="radio"
                            wire:model.live="gender"
                            value="women"
                            class="input-radio me-2"
                        >
                        <label class="input-label block">Women</label>
                    </div>
                    <div class="me-4 flex items-center">
                        <input
                            type="radio"
                            wire:model.live="gender"
                            value="other"
                            class="input-radio me-2"
                        >
                        <label class="input-label block">Other</label>
                    </div>
                </div>
            </div> --}}
            <div>
                <label class="input-label mb-1 block">Gender</label>
                <div class="mb-4 flex items-center">
                    <input
                        type="radio"
                        wire:model.live="gender"
                        value="men"
                        class="input-radio me-2"
                    >
                    <label class="input-label block">Men</label>
                </div>
                <div class="mb-4 flex items-center">
                    <input
                        type="radio"
                        wire:model.live="gender"
                        value="women"
                        class="input-radio me-2"
                    >
                    <label class="input-label block">Women</label>
                </div>
                <div class="mb-4 flex items-center">
                    <input
                        type="radio"
                        wire:model.live="gender"
                        value="other"
                        class="input-radio me-2"
                    >
                    <label class="input-label block">Other</label>
                </div>
            </div>
        </div>
    </div>
</div>
