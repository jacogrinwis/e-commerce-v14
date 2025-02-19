<div>
    <div>
        <h2 class="mb-4 text-xl font-bold">Personal Information</h2>

        <div class="space-y-4">
            <div>
                <label class="input-label mb-1 block">Address</label>
                <input
                    type="text"
                    wire:model.live="address"
                    class="input-text w-full"
                >
            </div>

            <div>
                <label class="input-label mb-1 block">Phone</label>
                <input
                    type="tel"
                    wire:model.live="phone"
                    class="input-text w-full"
                >
            </div>
        </div>
    </div>
</div>
