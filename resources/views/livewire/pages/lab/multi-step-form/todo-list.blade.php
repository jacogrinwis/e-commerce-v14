<div class="container max-w-md">
    @php
        $currentIndex = array_search($current, $steps);
    @endphp
    <ol class="mb-4 flex w-full items-center">
        @foreach ($steps as $index => $step)
            <li
                class="{{ $index !== array_key_last($steps)
                    ? 'w-full items-center after:inline-block after:h-1 after:mx-2 after:w-full after:border-4 after:border-b after:content-[\'\'] ' .
                        ($currentIndex > $index ? 'after:border-black' : 'after:border-gray-100')
                    : 'w-fit items-center' }} flex">
                <span
                    class="{{ $currentIndex > $index ? 'bg-black text-white' : 'bg-gray-100 text-gray-600 font-semibold' }} {{ $currentIndex === $index ? ' outline-2 outline-offset-3 outline-blue-100 size-9' : 'size-10' }} flex shrink-0 items-center justify-center rounded-full text-lg"
                >
                    @if ($currentIndex > $index)
                        <x-icons.check class="size-6" />
                    @else
                        {{ $index + 1 }}
                    @endif
                </span>
            </li>
        @endforeach
    </ol>

    <livewire:is
        :component="$current"
        :form-data="$formData"
        :key="$current"
    />

    <div class="mt-6 flex gap-4">
        @unless ($this->isFirstStep())
            <button
                wire:click="back"
                class="btn btn-secondary"
            >Back</button>
        @endunless

        @if ($this->isLastStep())
            <button
                wire:click="submit"
                class="btn btn-primary"
            >Submit</button>
        @else
            <button
                wire:click="next"
                class="btn btn-primary"
            >Next</button>
        @endif
    </div>
</div>
