<?php

namespace App\Livewire\Ui\Demo;

use Livewire\Component;
use Livewire\Attributes\On;

class Main extends Component
{
    public $message = '';
    public  $success = '';

    public $selectedItems = [];

    #[On('show-main-message')]
    public function showMessage($message)
    {
        session()->flash('message-from-aside-to-main', $message);
        $this->dispatch('show-aside-success-message', success: 'Message has been successfully sent!');
    }

    #[On('updated-selected-items')]
    public function updatedSelectedItems($items, $success = '')
    {
        $this->selectedItems = $items;
        session()->flash('successfully-removed-item', $success);
    }

    #[On('show-main-success-message')]
    public function showSuccessMessage($success)
    {
        session()->flash('success-from-aside-to-main', $success);
    }

    public function doNothing()
    {
        //
    }

    public function render()
    {
        return view('livewire.ui.demo.main');
    }
}
