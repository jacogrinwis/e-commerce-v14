<?php

namespace App\Livewire\Ui\Products;

use Livewire\Component;

class ColorBadges extends Component
{
    public $colors;

    public function render()
    {
        return view('livewire.ui.products.color-badges');
    }
}
