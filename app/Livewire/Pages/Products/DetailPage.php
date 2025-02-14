<?php

namespace App\Livewire\Pages\Products;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class DetailPage extends Component
{
    public $product;
    public $selectedColor;
    public $selectedMaterial;
    public $quantity = 1;

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

    public function incrementQuantity()
    {
        $this->quantity++;
    }

    public function decrementQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function addToCart($productId)
    {
        Cart::addToCart($productId);

        $this->dispatch('cart-updated');
    }

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
