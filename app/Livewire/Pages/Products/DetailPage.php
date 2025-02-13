<?php

namespace App\Livewire\Pages\Products;

use App\Facades\Cart;
use App\Models\Product;
use Livewire\Component;

class DetailPage extends Component
{
    public $product;
    public $selectedColor;
    public $selectedMaterial;
    public $quantity = 1;

    public function mount(Product $product)
    {
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
        return view('livewire.pages.products.detail-page', [
            'colors' => $this->product->colors,
            'materials' => $this->product->materials,
        ]);
    }
}
