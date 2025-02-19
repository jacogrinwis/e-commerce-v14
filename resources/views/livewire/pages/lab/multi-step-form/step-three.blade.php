<div>
    <div>
        <h2 class="mb-4 text-xl font-bold">Review Your Information</h2>

        <div class="space-y-4">
            <div>
                <p class="font-medium">Name:</p>
                <p>{{ $formData['step1']['name'] }}</p>
            </div>

            <div>
                <p class="font-medium">Email:</p>
                <p>{{ $formData['step1']['email'] }}</p>
            </div>

            <div>
                <p class="font-medium">Gender:</p>
                <p>{{ $formData['step1']['gender'] }}</p>
            </div>

            <div>
                <p class="font-medium">Address:</p>
                <p>{{ $formData['step2']['address'] }}</p>
            </div>

            <div>
                <p class="font-medium">Phone:</p>
                <p>{{ $formData['step2']['phone'] }}</p>
            </div>
        </div>
    </div>
</div>
