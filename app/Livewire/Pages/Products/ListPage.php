<?php

namespace App\Livewire\Pages\Products;

use Spatie\Tags\Tag;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use App\Models\StockStatus;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ListPage extends Component
{
    use WithPagination;

    // URL parameters voor filters
    // Deze properties worden automatisch gesynchroniseerd met de URL parameters
    // 'keep: false' zorgt ervoor dat lege waarden niet in de URL blijven staan
    #[Url(as: 'category', keep: false)]
    public $queryStringCategory = '';

    #[Url(as: 'color', keep: false)]
    public $queryStringColor = '';

    #[Url(as: 'material', keep: false)]
    public $queryStringMaterial = '';

    #[Url(as: 'stock', keep: false)]
    public $queryStringStockStatuses = '';

    #[Url(as: 'tag', keep: false)]
    public $queryStringTag = '';

    // Arrays om de actueel geselecteerde filter IDs bij te houden
    // Deze worden gebruikt voor de checkbox states en filtering
    public $selectedCategories = [];
    public $selectedColors = [];
    public $selectedMaterials = [];
    public $selectedStockStatuses = [];
    public $selectedTags = [];

    // Toggle states voor het uitklappen/inklappen van filter secties
    // Standaard zijn alle secties ingeklapt
    public $showAllCategories = false;
    public $showAllColors = false;
    public $showAllMaterials = false;
    public $showAllTags = false;

    /**
     * Initialiseer component met URL parameters
     * Deze methode wordt uitgevoerd wanneer de component wordt geladen
     * Zet de filters op basis van de URL parameters
     */
    public function mount()
    {
        // Voor elke filter type:
        // 1. Check of er URL parameters zijn
        // 2. Converteer de slug(s) naar database IDs
        // 3. Update de geselecteerde waarden
        // 4. Update de URL parameters voor consistentie

        if ($this->queryStringCategory) {
            $categoryIds = Category::whereIn('slug', explode(',', $this->queryStringCategory))->pluck('id');
            $this->selectedCategories = $categoryIds->toArray();
            $this->updatedSelectedCategories();
        }

        if ($this->queryStringColor) {
            $colorIds = Color::whereIn('slug', explode(',', $this->queryStringColor))->pluck('id');
            $this->selectedColors = $colorIds->toArray();
            $this->updatedSelectedColors();
        }

        if ($this->queryStringMaterial) {
            $materialIds = Material::whereIn('slug', explode(',', $this->queryStringMaterial))->pluck('id');
            $this->selectedMaterials = $materialIds->toArray();
            $this->updatedSelectedMaterials();
        }

        // Speciale behandeling voor voorraadstatussen omdat we hier met namen werken
        if ($this->queryStringStockStatuses) {
            $stockIds = StockStatus::whereIn(
                DB::raw('LOWER(name)'),
                collect(explode(',', $this->queryStringStockStatuses))
                    ->map(fn($slug) => str_replace('-', ' ', $slug))
                    ->toArray()
            )->pluck('id');
            $this->selectedStockStatuses = $stockIds->toArray();
            $this->updatedSelectedStockStatuses();
        }

        // Speciale behandeling voor tags vanwege JSON taal velden
        if ($this->queryStringTag) {
            $tagSlugs = explode(',', $this->queryStringTag);
            $tagIds = Tag::query()
                ->whereJsonContains('slug->en', $tagSlugs[0])
                ->pluck('id');
            $this->selectedTags = $tagIds->toArray();
            $this->updatedSelectedTags();
        }
    }

    /**
     * Deze methodes worden automatisch aangeroepen wanneer de corresponderende
     * selected* properties worden gewijzigd (bijvoorbeeld door checkbox interactie)
     * Ze zorgen ervoor dat de URL parameters worden bijgewerkt
     */
    public function updatedSelectedCategories()
    {
        $this->queryStringCategory = $this->convertToSlugString($this->selectedCategories, 'categories');
    }

    public function updatedSelectedColors()
    {
        $this->queryStringColor = $this->convertToSlugString($this->selectedColors, 'colors');
    }

    public function updatedSelectedMaterials()
    {
        $this->queryStringMaterial = $this->convertToSlugString($this->selectedMaterials, 'materials');
    }

    public function updatedSelectedStockStatuses()
    {
        $this->queryStringStockStatuses = $this->convertToSlugString($this->selectedStockStatuses, 'stock');
    }

    public function updatedSelectedTags()
    {
        $this->queryStringTag = $this->convertToSlugString($this->selectedTags, 'tags');
    }

    /**
     * Hulpmethode om geselecteerde IDs om te zetten naar URL-vriendelijke slugs
     * @param array $ids Array met database IDs
     * @param string $type Type filter (categories/colors/materials/stock/tags)
     * @return string Komma-gescheiden lijst van slugs
     */
    private function convertToSlugString($ids, $type)
    {
        $slugs = match ($type) {
            'categories' => Category::whereIn('id', $ids)->pluck('slug')->toArray(),
            'colors' => Color::whereIn('id', $ids)->pluck('slug')->toArray(),
            'materials' => Material::whereIn('id', $ids)->pluck('slug')->toArray(),
            'stock' => StockStatus::whereIn('id', $ids)->pluck('name')->map(fn($name) => Str::slug($name))->toArray(),
            'tags' => Tag::whereIn('id', $ids)->pluck('slug')->toArray(),
        };

        return implode(',', $slugs);
    }

    /**
     * Reset alle filters naar hun beginwaarde
     * Maakt zowel de selecties als de URL parameters leeg
     */
    public function resetAllFilters()
    {
        // Reset geselecteerde waarden
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->selectedMaterials = [];
        $this->selectedStockStatuses = [];
        $this->selectedTags = [];

        // Reset URL parameters
        $this->queryStringCategory = [];
        $this->queryStringColor = [];
        $this->queryStringMaterial = [];
        $this->queryStringStockStatuses = [];
        $this->queryStringTag = [];
    }

    /**
     * Verwijder één specifieke filterwaarde
     * @param string $type Type filter (categories/colors/materials/stock_status/tags)
     * @param mixed $id Database ID van de te verwijderen waarde
     */
    public function removeFilter($type, $id)
    {
        switch ($type) {
            case 'categories':
                // Verwijder de waarde uit de selectie
                $this->selectedCategories = collect($this->selectedCategories)
                    ->reject(fn($item) => $item == $id)
                    ->values()
                    ->toArray();
                // Update de URL parameter, maak leeg als er geen selecties meer zijn
                $this->queryStringCategory = empty($this->selectedCategories)
                    ? null
                    : $this->convertToSlugString($this->selectedCategories, 'categories');
                break;
            case 'colors':
                $this->selectedColors = collect($this->selectedColors)
                    ->reject(fn($item) => $item == $id)
                    ->values()
                    ->toArray();
                $this->queryStringColor = empty($this->selectedColors)
                    ? null
                    : $this->convertToSlugString($this->selectedColors, 'colors');
                break;
            case 'materials':
                $this->selectedMaterials = collect($this->selectedMaterials)
                    ->reject(fn($item) => $item == $id)
                    ->values()
                    ->toArray();
                $this->queryStringMaterial = empty($this->selectedMaterials)
                    ? null
                    : $this->convertToSlugString($this->selectedMaterials, 'materials');
                break;
            case 'stock_status':
                $this->selectedStockStatuses = collect($this->selectedStockStatuses)
                    ->reject(fn($item) => $item == $id)
                    ->values()
                    ->toArray();
                $this->queryStringStockStatuses = empty($this->selectedStockStatuses)
                    ? null
                    : $this->convertToSlugString($this->selectedStockStatuses, 'stock');
                break;
            case 'tags':
                $this->selectedTags = array_values(array_filter($this->selectedTags, fn($item) => $item != $id));
                $this->queryStringTag = empty($this->selectedTags)
                    ? null
                    : $this->convertToSlugString($this->selectedTags, 'tags');
                break;
        }
    }

    /**
     * Voeg een product toe aan de winkelwagen
     * @param int $id Product ID
     */
    public function addToCart($id)
    {
        session()->flash('message', 'Product toegevoegd aan winkelwagen! ' . $id);
    }

    /**
     * Render de productlijst met filters
     * Deze methode wordt elke keer uitgevoerd als er een update nodig is
     */
    public function render()
    {
        // Hoofdquery voor producten met alle benodigde relaties
        $query = Product::select([
            'id',
            'name',
            'slug',
            'cover',
            'price',
            'discount',
            'discount_price',
            'stock_status',
            'category_id'
        ])
            ->with(['category', 'colors', 'materials', 'tags']);

        // Basis query voor het berekenen van beschikbare filter opties
        $baseQuery = Product::select(['id', 'category_id', 'stock_status_id']);

        // Pas filters toe op beide queries
        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
            $baseQuery->whereIn('category_id', $this->selectedCategories);
        }

        if (!empty($this->selectedColors)) {
            $query->whereHas('colors', fn($q) => $q->whereIn('colors.id', $this->selectedColors));
            $baseQuery->whereHas('colors', fn($q) => $q->whereIn('colors.id', $this->selectedColors));
        }

        if (!empty($this->selectedMaterials)) {
            $query->whereHas('materials', fn($q) => $q->whereIn('materials.id', $this->selectedMaterials));
            $baseQuery->whereHas('materials', fn($q) => $q->whereIn('materials.id', $this->selectedMaterials));
        }

        if (!empty($this->selectedStockStatuses)) {
            $query->whereIn('stock_status_id', $this->selectedStockStatuses);
            $baseQuery->whereIn('stock_status_id', $this->selectedStockStatuses);
        }

        if (!empty($this->selectedTags)) {
            $tagNames = Tag::whereIn('id', $this->selectedTags)->pluck('name')->toArray();
            $query->withAnyTags($tagNames);
            $baseQuery->withAnyTags($tagNames);
        }

        // Bereken beschikbare categorieën en hun product tellingen
        $categories = Category::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        // Bereken beschikbare kleuren en hun product tellingen
        $colors = Color::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        // Bereken beschikbare materialen en hun product tellingen
        $materials = Material::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        // Bereken beschikbare tags en hun product tellingen
        $filteredProductIds = $baseQuery->select('id')->pluck('id');
        $tags = DB::table('tags')
            ->select('tags.id', 'tags.name', DB::raw('COUNT(DISTINCT taggables.taggable_id) as products_count'))
            ->join('taggables', 'tags.id', '=', 'taggables.tag_id')
            ->where('taggables.taggable_type', Product::class)
            ->whereIn('taggables.taggable_id', $filteredProductIds)
            ->groupBy('tags.id', 'tags.name')
            ->get();

        // Bereken beschikbare voorraadstatussen en hun product tellingen
        $availableStockStatuses = $baseQuery->clone()
            ->select('stock_status_id')
            ->selectRaw('count(*) as total')
            ->groupBy('stock_status_id')
            ->having('total', '>', 0)
            ->pluck('total', 'stock_status_id')
            ->toArray();

        // Haal de namen op van de beschikbare voorraadstatussen
        $stockStatuses = StockStatus::whereIn('id', array_keys($availableStockStatuses))
            ->pluck('name', 'id')
            ->toArray();

        // Haal de gefilterde producten op met paginering
        $products = $query->paginate(12);

        // Render de view met alle benodigde data
        return view('livewire.pages.products.list-page', [
            'products' => $products,
            'categories' => $categories,
            'colors' => $colors,
            'materials' => $materials,
            'tags' => $tags,
            'stockStatuses' => $stockStatuses,
            'stockStatusCounts' => $availableStockStatuses,
        ]);
    }
}
