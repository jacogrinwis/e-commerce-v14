<?php

namespace App\Livewire\Pages\Cart;

use App\Models\Order;
use Livewire\Component;

class CheckoutConfirmationPage extends Component
{
    public Order $order;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.pages.cart.checkout-confirmation-page');
    }
}
