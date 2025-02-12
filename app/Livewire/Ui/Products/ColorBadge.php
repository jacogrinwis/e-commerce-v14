<?php

namespace App\Livewire\Ui\Products;

use Livewire\Component;

class ColorBadge extends Component
{
    public $color;

    public function render()
    {
        return view('livewire.ui.products.color-badge');
    }
}
