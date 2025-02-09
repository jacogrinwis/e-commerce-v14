<?php

namespace App\Livewire\Ui\Demo;

use Livewire\Component;
use Livewire\Attributes\On;

class DemoChild extends Component
{
    public $message;

    #[On('show-message')]
    public function showMessage($message)
    {
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.ui.demo.demo-child');
    }
}
