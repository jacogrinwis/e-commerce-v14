<?php

namespace App\Livewire\Pages\Demo;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.demo')]
class LayoutDetail extends Component
{
    public function render()
    {
        return view('livewire.pages.demo.layout-detail');
    }
}
