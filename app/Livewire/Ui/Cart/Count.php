<?php

namespace App\Livewire\Ui\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class Count extends Component
{
    #[On('cart-updated')]
    public function updateCount()
    {
        // This will trigger a re-render
        $this->render();
    }

    public function render()
    {
        return view('livewire.ui.cart.count', [
            'itemCount' => Cart::getItemCount()
        ]);
    }
}
