<div class="container my-24 grid grid-cols-4 gap-16">
    <aside
        wire:loading.class="opacity-50"
        x-data="{ open: true }"
        class="col-span-1 space-y-6 text-sm"
    >
        @if (count($selectedCategories) > 0 ||
                count($selectedColors) > 0 ||
                count($selectedMaterials) > 0 ||
                count($selectedStockStatuses) > 0 ||
                count($selectedTags) > 0)
            <section>
                <div class="mb-2 flex items-center justify-between">
                    <h3 class="text-lg font-semibold">Actieve filters:</h3>
                    <button
                        wire:click="resetAllFilters"
                        class="text-sm font-semibold text-red-600 hover:text-red-800"
                    >
                        Wis alle filters
                    </button>
                </div>
                <div class="flex flex-wrap items-center gap-1">

                    @foreach ($categories->whereIn('id', $selectedCategories) as $category)
                        <button
                            wire:key="active-category-{{ $category->id }}"
                            wire:click="removeFilter('categories', {{ $category->id }})"
                            class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                        >
                            {{ $category->name }}
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    @endforeach

                    @foreach ($colors->whereIn('id', $selectedColors) as $color)
                        <button
                            wire:key="active-color-{{ $color->id }}"
                            wire:click="removeFilter('colors', {{ $color->id }})"
                            class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                        >
                            {{ $color->name }}
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    @endforeach

                    @foreach ($materials->whereIn('id', $selectedMaterials) as $material)
                        <button
                            wire:key="active-material-{{ $material->id }}"
                            wire:click="removeFilter('materials', {{ $material->id }})"
                            class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                        >
                            {{ $material->name }}
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    @endforeach

                    @foreach ($selectedStockStatuses as $statusId)
                        <button
                            wire:key="active-stock_status-{{ $statusId }}"
                            wire:click="removeFilter('stock_status', {{ $statusId }})"
                            class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                        >
                            {{ $stockStatuses[$statusId] }}
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    @endforeach


                    @foreach ($tags->whereIn('id', $selectedTags) as $tag)
                        <button
                            wire:key="active-tag-{{ $tag->id }}"
                            wire:click="removeFilter('tags', {{ $tag->id }})"
                            class="flex items-center gap-2 rounded-full bg-gray-100 px-3 py-1"
                        >
                            {{ json_decode($tag->name)->en }}
                            <svg
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    @endforeach

                </div>
            </section>
        @endif

        <section x-data="{ open: true }">
            <div class="mb-2 flex items-center justify-between">
                <h4
                    class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                    @click="open = !open"
                >
                    <span>Categorieen ({{ $categories->count() }})</span>
                    <svg
                        class="h-5 w-5 transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </h4>
                @if (count($selectedCategories) > 0)
                    <button
                        wire:click="$set('selectedCategories', [])"
                        class="text-sm text-red-600 hover:text-red-800"
                    >
                        Reset
                    </button>
                @endif
            </div>
            <div x-show="open">
                @foreach ($categories->take($showAllCategories ? 100 : 10) as $category)
                    <div wire:key="category-{{ $category->id }}">
                        <label class="mb-2 flex items-center gap-2">
                            <input
                                id="category-{{ $category->id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded-md border-gray-300"
                                wire:model.live="selectedCategories"
                                value="{{ $category->id }}"
                            >
                            {{ $category->name }} ({{ $category->products_count }})
                        </label>
                    </div>
                @endforeach
                @if ($categories->count() > 10)
                    <button
                        wire:click="$toggle('showAllCategories')"
                        class="text-sm font-semibold text-blue-600"
                    >
                        {{ $showAllCategories ? 'Toon minder' : 'Toon meer (' . ($categories->count() - 5) . ')' }}
                    </button>
                @endif
            </div>
        </section>


        <section x-data="{ open: true }">
            <div class="mb-2 flex items-center justify-between">
                <h4
                    class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                    @click="open = !open"
                >
                    <span>Kleuren ({{ $colors->count() }})</span>
                    <svg
                        class="h-5 w-5 transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </h4>
                @if (count($selectedColors) > 0)
                    <button
                        wire:click="$set('selectedColors', [])"
                        class="text-sm text-red-600 hover:text-red-800"
                    >
                        Reset
                    </button>
                @endif
            </div>
            <div x-show="open">
                @foreach ($colors->take($showAllColors ? 100 : 10) as $color)
                    <div wire:key="color-{{ $color->id }}">
                        <label class="mb-2 flex items-center gap-2">
                            <input
                                id="color-{{ $color->id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded-md border-gray-300"
                                wire:model.live="selectedColors"
                                value="{{ $color->id }}"
                            >
                            <span
                                class="bg-{{ $color->tailwind_color }}{{ !in_array($color->tailwind_color, ['white', 'black']) ? '-500' : '' }} {{ $color->tailwind_color == 'white' ? 'border border-gray-300' : '' }} size-3 rounded-full"
                            ></span>
                            {{ $color->name }} ({{ $color->products_count }})
                        </label>
                    </div>
                @endforeach
                @if ($colors->count() > 10)
                    <button
                        wire:click="$toggle('showAllColors')"
                        class="text-sm font-semibold text-blue-600"
                    >
                        {{ $showAllColors ? 'Toon minder' : 'Toon meer (' . ($colors->count() - 5) . ')' }}
                    </button>
                @endif
            </div>
        </section>

        <section x-data="{ open: true }">
            <div class="mb-2 flex items-center justify-between">
                <h4
                    class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                    @click="open = !open"
                >
                    <span>Materialen ({{ $materials->count() }})</span>
                    <svg
                        class="h-5 w-5 transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </h4>
                @if (count($selectedMaterials) > 0)
                    <button
                        wire:click="$set('selectedMaterials', [])"
                        class="text-sm text-red-600 hover:text-red-800"
                    >
                        Reset
                    </button>
                @endif
            </div>
            <div x-show="open">
                @foreach ($materials->take($showAllMaterials ? 100 : 10) as $material)
                    <div wire:key="material-{{ $material->id }}">
                        <label class="mb-2 flex items-center gap-2">
                            <input
                                id="material-{{ $material->id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded-md border-gray-300"
                                wire:model.live="selectedMaterials"
                                value="{{ $material->id }}"
                                class="form-check-input"
                            >
                            {{ $material->name }} ({{ $material->products_count }})
                        </label>
                    </div>
                @endforeach
                @if ($categories->count() > 10)
                    <button
                        wire:click="$toggle('showAllMaterials')"
                        class="text-sm font-semibold text-blue-600"
                    >
                        {{ $showAllMaterials ? 'Toon minder' : 'Toon meer (' . ($materials->count() - 5) . ')' }}
                    </button>
                @endif
            </div>
        </section>

        <section x-data="{ open: true }">
            <div class="mb-2 flex items-center justify-between">
                <h3
                    class="flex cursor-pointer items-center justify-between gap-2 text-lg font-semibold"
                    @click="open = !open"
                >
                    <span>Beschikbaarheid</span>
                    <span class="flex items-center">
                        <svg
                            class="h-5 w-5 transition-transform duration-200"
                            :class="{ 'rotate-180': open }"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            />
                        </svg>
                    </span>
                </h3>
                @if (count($selectedStockStatuses) > 0)
                    <button
                        wire:click="$set('selectedStockStatuses', [])"
                        class="text-sm text-red-600 hover:text-red-800"
                    >
                        Reset
                    </button>
                @endif
            </div>
            <div x-show="open">
                @foreach ($stockStatuses as $id => $name)
                    <div wire:key="stock-{{ $id }}">
                        <label class="mb-2 flex items-center gap-2">
                            <input
                                id="stock-{{ $id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded-md border-gray-300"
                                wire:model.live="selectedStockStatuses"
                                value="{{ $id }}"
                            >
                            {{ $name }} ({{ $stockStatusCounts[$id] ?? 0 }})
                        </label>
                    </div>
                @endforeach
            </div>
        </section>



        <section x-data="{ open: true }">
            <div class="mb-2 flex items-center justify-between">
                <h4
                    class="flex cursor-pointer items-center gap-2 text-lg font-semibold"
                    @click="open = !open"
                >
                    <span>Tags ({{ $tags->count() }})</span>
                    <svg
                        class="h-5 w-5 transition-transform duration-200"
                        :class="{ 'rotate-180': open }"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        />
                    </svg>
                </h4>
                @if (count($selectedTags) > 0)
                    <button
                        wire:click="$set('selectedTags', [])"
                        class="text-sm text-red-600 hover:text-red-800"
                    >
                        Reset
                    </button>
                @endif
            </div>
            <div x-show="open">
                @foreach ($tags->take($showAllTags ? 100 : 10) as $tag)
                    <div wire:key="tag-{{ $tag->id }}">
                        <label class="mb-2 flex items-center gap-2">
                            <input
                                id="tag-{{ $tag->id }}"
                                type="checkbox"
                                class="h-4 w-4 rounded-md border-gray-300"
                                wire:model.live="selectedTags"
                                value="{{ $tag->id }}"
                            >
                            {{ json_decode($tag->name)->en }} ({{ $tag->products_count }})
                        </label>
                    </div>
                @endforeach
                @if ($tags->count() > 10)
                    <button
                        wire:click="$toggle('showAllTags')"
                        class="text-sm font-semibold text-blue-600"
                    >
                        {{ $showAllTags ? 'Toon minder' : 'Toon meer (' . ($tags->count() - 5) . ')' }}
                    </button>
                @endif
            </div>
        </section>

    </aside>

    <main
        wire:loading.class="opacity-50"
        class="col-span-3 grid grid-cols-3 gap-6"
    >
        @foreach ($products as $product)
            <livewire:ui.products.card
                :$product
                wire:key="product-{{ $product->id }}"
            />
        @endforeach
        <div class="col-span-3">
            {{ $products->links() }}
        </div>
    </main>
</div>
