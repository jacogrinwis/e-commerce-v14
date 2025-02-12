<?php

namespace App\Livewire\Pages\Beta;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.beta')]
class ProductList extends Component
{
    public function render()
    {
        return view('livewire.pages.beta.product-list');
    }
}
