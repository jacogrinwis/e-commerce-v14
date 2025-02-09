<?php

namespace App\Livewire\Pages\Demo;

use Livewire\Component;
use Livewire\Attributes\On;

class DemoList extends Component
{
    public $message;
    // public $selectedItems = [];

    // #[On('selected-items-updated')]
    // public function selectedItems($selectedItems)
    // {
    //     $this->selectedItems = $selectedItems;
    // }

    #[On('customEvent')]
    public function handleCustomEvent($data)
    {
        $this->message = $data['message'];
    }

    public function render()
    {
        return view('livewire.pages.demo.demo-list');
    }
}
