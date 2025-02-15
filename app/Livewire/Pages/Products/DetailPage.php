<?php

namespace App\Livewire\Pages\Products;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

/**
 * Livewire component voor de product detail pagina
 * Toont alle product informatie en biedt functionaliteit voor het toevoegen aan winkelwagen
 */
class DetailPage extends Component
{
    /**
     * Het product dat getoond wordt
     */
    public $product;

    /**
     * De geselecteerde kleur optie
     */
    public $selectedColor;

    /**
     * Het geselecteerde materiaal
     */
    public $selectedMaterial;

    /**
     * De geselecteerde hoeveelheid, standaard 1
     */
    public $quantity = 1;

    /**
     * Initialiseert de component met product en categorie data
     * Controleert of het product bij de juiste categorie hoort
     * Stelt standaard kleur en materiaal in
     */
    public function mount(Category $category, Product $product)
    {
        // Verify product belongs to category
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        $this->product = $product;
        $this->selectedColor = $product->colors->first()?->id;
        $this->selectedMaterial = $product->materials->first()?->id;
    }

    /**
     * Verhoogt de geselecteerde hoeveelheid met 1
     */
    public function incrementQuantity()
    {
        $this->quantity++;
    }

    /**
     * Verlaagt de geselecteerde hoeveelheid met 1
     * Zorgt dat de hoeveelheid niet onder 1 kan komen
     */
    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    /**
     * Voegt het product toe aan de winkelwagen
     * Verstuurt een event om de winkelwagen bij te werken
     */
    public function addToCart($productId)
    {
        Cart::addToCart($productId);

        $this->dispatch('cart-updated');
    }

    /**
     * Rendert de detail pagina met alle benodigde data
     * Bouwt de breadcrumb navigatie op
     */
    public function render()
    {
        $segments = [
            [
                'label' => 'Products',
                'url' => route('products.list')
            ],
            [
                'label' => $this->product->category->name,
                'url' => route('products.list', ['category' => $this->product->category->slug])
            ],
            [
                'label' => $this->product->name,
                'url' => null
            ]
        ];

        return view('livewire.pages.products.detail-page', [
            'colors' => $this->product->colors,
            'materials' => $this->product->materials,
            'segments' => $segments
        ]);
    }
}
