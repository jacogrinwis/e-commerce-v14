<?php

namespace App\Livewire\Pages\Products;

use Spatie\Tags\Tag;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Material;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

/**
 * Livewire component voor de productlijst pagina.
 * Beheert het filteren en pagineren van producten op basis van verschillende criteria.
 */
class ProductList extends Component
{
    use WithPagination;

    // Arrays om de geselecteerde filterwaarden bij te houden
    public $selectedCategories = [];    // Geselecteerde categorieën
    public $selectedColors = [];        // Geselecteerde kleuren
    public $selectedMaterials = [];     // Geselecteerde materialen 
    public $selectedStockStatuses = []; // Geselecteerde voorraadstatussen
    public $selectedTags = [];          // Geselecteerde tags

    // Toggle variabelen voor het tonen van alle filter opties
    public $showAllCategories = false;  // Toon alle categorieën
    public $showAllColors = false;      // Toon alle kleuren
    public $showAllMaterials = false;   // Toon alle materialen
    public $showAllTags = false;        // Toon alle tags

    /**
     * Reset alle filterwaarden naar hun beginwaarde
     */
    public function resetAllFilters()
    {
        $this->selectedCategories = [];
        $this->selectedColors = [];
        $this->selectedMaterials = [];
        $this->selectedStockStatuses = [];
        $this->selectedTags = [];
    }

    /**
     * Verwijder een specifieke filterwaarde
     * @param string $type Het type filter (categories/colors/materials/stock_status/tags)
     * @param mixed $id De ID van de te verwijderen filterwaarde
     */
    public function removeFilter($type, $id)
    {
        switch ($type) {
            case 'categories':
                $this->selectedCategories = collect($this->selectedCategories)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'colors':
                $this->selectedColors = collect($this->selectedColors)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'materials':
                $this->selectedMaterials = collect($this->selectedMaterials)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'stock_status':
                $this->selectedStockStatuses = collect($this->selectedStockStatuses)->reject(fn($item) => $item == $id)->values()->toArray();
                break;
            case 'tags':
                $this->selectedTags = array_values(array_filter($this->selectedTags, fn($item) => $item != $id));
                break;
        }
    }

    /**
     * Voeg een product toe aan de winkelwagen
     * @param int $id Product ID
     */
    public function addToCart($id)
    {
        session()->flash('message', 'Product added to cart! ' . $id);
    }

    /**
     * Render de component met gefilterde producten en beschikbare filter opties
     */
    public function render()
    {
        // Hoofdquery voor producten met basis selecties
        $query = Product::select(['id', 'name', 'slug', 'cover', 'price', 'discount', 'discount_price', 'stock_status', 'category_id'])
            ->with(['category', 'colors', 'materials', 'tags']);

        // Basis query voor filter berekeningen
        $baseQuery = Product::select(['id', 'category_id', 'stock_status_id']); // Alleen de velden die nodig zijn voor filtering

        // Pas filters toe op basis van selecties
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

        // Bereken beschikbare filter opties op basis van huidige selectie
        $categories = Category::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        // Haal beschikbare kleuren op met product tellingen
        $colors = Color::whereHas('products', function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        })->withCount(['products' => function ($query) use ($baseQuery) {
            $query->whereIn('products.id', $baseQuery->select('id'));
        }])->get();

        // Haal beschikbare materialen op met product tellingen
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

        // Bereken beschikbare voorraadstatussen en hun aantallen
        $availableStockStatuses = $baseQuery->clone()
            ->select('stock_status_id')
            ->selectRaw('count(*) as total')
            ->groupBy('stock_status_id')
            ->having('total', '>', 0)
            ->pluck('total', 'stock_status_id')
            ->toArray();

        // Haal voorraadstatussen op uit de database met hun namen
        $stockStatuses = \App\Models\StockStatus::whereIn('id', array_keys($availableStockStatuses))
            ->pluck('name', 'id')
            ->toArray();


        // Haal gefilterde producten op met paginering
        $products = $query->paginate(12);

        // Render de view met alle benodigde data
        return view('livewire.pages.products.product-list', [
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
