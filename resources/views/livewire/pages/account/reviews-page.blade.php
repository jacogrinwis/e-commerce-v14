<div class="container grid grid-cols-4 gap-x-6 pb-6">
    <div class="col-span-full mb-6">
        <x-breadcrumb />
    </div>

    @include('livewire.pages.account.partials.menu')

    <main class="col-span-3">
        <h1 class="mb-6 text-2xl font-semibold">Mijn reviews</h1>

        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-50 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @forelse ($reviews as $review)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm">
                    <div class="flex items-start justify-between gap-6">
                        <div>
                            <h3 class="font-medium">{{ $review->product->name }}</h3>
                            <div class="mt-1">
                                <x-rating :rating="$review->rating" />
                            </div>
                            <p class="mt-2 text-gray-600">{{ $review->comment }}</p>
                            <span class="mt-2 block text-sm text-gray-500">
                                Geplaatst op {{ $review->created_at->format('d-m-Y') }}
                            </span>
                        </div>
                        <button
                            wire:click="deleteReview({{ $review->id }})"
                            wire:confirm="Weet je zeker dat je deze review wilt verwijderen?"
                            class="text-sm text-red-600 hover:underline"
                        >
                            Verwijderen
                        </button>
                    </div>
                </div>
            @empty
                <p class="text-gray-600">Je hebt nog geen reviews geplaatst.</p>
            @endforelse
        </div>
    </main>
</div>
