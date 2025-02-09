<?php

namespace App\Livewire\Pages\Demo;

use Livewire\Component;
use Livewire\Attributes\On;

class Aside extends Component
{
    public $message = '';
    public $success = '';
    public $warning = '';

    public $selectedItems = [];

    #[On('show-aside-message')]
    public function showMessage($message)
    {
        // $this->message = $message;
        session()->flash('message-from-main-to-aside', $message);
        $this->dispatch('show-main-success-message', success: 'Message has been successfully sent!');
    }

    #[On('show-aside-success-message')]
    public function showSuccessMessage($success)
    {
        session()->flash('success-from-main-to-aside', $success);
    }

    #[On('remove-item')]
    public function removeItem($item)
    {
        $this->selectedItems = array_values(array_filter($this->selectedItems, fn($i) => $i != $item));
        $this->dispatch('updated-selected-items', items: $this->selectedItems, success: 'Item has been successfully removed!');
    }

    public function updatedSelectedItems()
    {
        sort($this->selectedItems);
        $this->dispatch('updated-selected-items', items: $this->selectedItems);
    }

    // public function clearWarning()
    // {
    //     $this->warning = null;
    // }

    #[On('first-this-then-that')]
    public function firstThisThenThat()
    {
        session()->flash('first-this-then-that', 'First This Then That!');
    }

    // public function redirectToHome()
    // {
    //     // return redirect()->route('home');
    // }

    public function doNothing()
    {
        //
    }

    public function render()
    {
        return view('livewire.pages.demo.aside');
    }
}
