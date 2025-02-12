<div class="mx-auto w-full max-w-xl p-4">
    <div class="flex flex-col items-center space-y-4">
        <div class="flex space-x-1">
            @for ($i = 1; $i <= 5; $i++)
                <button
                    wire:click="$set('rating', {{ $i }})"
                    class="focus:outline-none"
                >
                    <svg
                        class="{{ $i <= $rating ? 'text-yellow-400' : 'text-gray-300' }} h-8 w-8"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                        />
                    </svg>
                </button>
            @endfor
        </div>

        <textarea
            wire:model="comment"
            class="w-full rounded-lg border p-2 focus:ring-2 focus:ring-blue-500"
            placeholder="Share your thoughts about this product..."
            rows="3"
        ></textarea>

        <button
            wire:click="rate"
            class="rounded-lg bg-blue-600 px-4 py-2 text-white transition-colors hover:bg-blue-700"
            {{ $rating === 0 ? 'disabled' : '' }}
        >
            Submit Rating
        </button>
    </div>

    <div class="mt-4">
        <h3 class="text-lg font-semibold">Average Rating: {{ $product->ratings()->avg('rating') ?? 0 }}/5</h3>
        <p class="text-gray-600">{{ $product->ratings()->count() }} total ratings</p>
    </div>
</div>
