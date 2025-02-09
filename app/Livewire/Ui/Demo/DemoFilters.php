<?php

namespace App\Livewire\Ui\Demo;

use Livewire\Component;

class DemoFilters extends Component
{
    // public $selectedItems = [];

    // public function updatedSelectedItems()
    // {
    //     $this->dispatch('selected-items-updated', selectedItems: $this->selectedItems);
    // }

    public function render()
    {
        return view('livewire.ui.demo.demo-filters');
    }
}
