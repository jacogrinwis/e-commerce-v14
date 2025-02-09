@props(['rating', 'maxRating' => 5])

<div class="inline-flex items-center space-x-1">
    @for ($i = 1; $i <= $maxRating; $i++)
        <span class="text-2xl focus:outline-none">
            @if ($i <= $rating)
                <x-icons.star class="size-6 text-yellow-300" />
            @else
                <x-icons.star class="size-6 text-gray-300" />
            @endif
        </span>
    @endfor
</div>
