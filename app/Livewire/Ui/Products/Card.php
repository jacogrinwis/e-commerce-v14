<?php

namespace App\Livewire\Ui\Products;

use Livewire\Component;

class Card extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.ui.products.card');
    }
}
