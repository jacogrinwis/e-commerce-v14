<div>
    <div>
        <h2 class="mb-4 text-xl font-bold">Review Your Information</h2>
        <p class="mb-4 text-sm text-gray-500">Order confirmation</p>
        <p class="mb-4 text-sm text-gray-500">Please review your information before submitting</p>

        <div class="space-y-4">
            <dl class="flex gap-4">
                <dt class="input-label mb-1 block w-16">Name:</dt>
                <dd>{{ $formData['step1']['name'] }}</dd>
            </dl>

            <dl class="flex gap-4">
                <dt class="input-label mb-1 block w-16">Email:</dt>
                <dd>{{ $formData['step1']['email'] }}</dd>
            </dl>

            <dl class="flex gap-4">
                <dt class="input-label mb-1 block w-16">Gender:</dt>
                <dd>{{ $formData['step1']['gender'] }}</dd>
            </dl>

            <dl class="flex gap-4">
                <dt class="input-label mb-1 block w-16">Address:</dt>
                <dd>{{ $formData['step2']['address'] }}</dd>
            </dl>

            <dl class="flex gap-4">
                <dt class="input-label mb-1 block w-16">Phone:</dt>
                <dd>{{ $formData['step2']['phone'] }}</dd>
            </dl>

            {{-- <div class="grid grid-cols-2">
                <label class="input-label mb-1 block">Name:</label>
                <span>{{ $formData['step1']['name'] }}</span>
                <label class="input-label mb-1 block">Email:</label>
                <span>{{ $formData['step1']['email'] }}</span>
                <label class="input-label mb-1 block">Gender:</label>
                <span>{{ $formData['step1']['gender'] }}</span>
                <label class="input-label mb-1 block">Address:</label>
                <span>{{ $formData['step2']['address'] }}</span>
                <label class="input-label mb-1 block">Phone:</label>
                <span>{{ $formData['step2']['phone'] }}</span>
            </div> --}}

            <div>
                <label class="input-label mb-1 block">Opmerking:</label>
                <textarea
                    name=""
                    id=""
                    class="input-text w-full"
                ></textarea>
            </div>
        </div>
    </div>
</div>
