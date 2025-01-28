<?php

namespace App\Livewire\Ui\Products;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.ui.products.product-card');
    }
}
