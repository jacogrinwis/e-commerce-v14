<?php

namespace App\Livewire\Ui\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

class Overview extends Component
{
    #[On('cart-updated')]
    public function updateOverview()
    {
        // This will trigger a re-render
        $this->render();
    }

    public function removeItem($productId)
    {
        Cart::removeFromCart($productId);
        $this->dispatch('cart-updated');
    }

    // #[On('cart-updated')]
    public function updateQuantity($productId, $quantity)
    {
        Cart::updateQuantity($productId, $quantity);
    }

    public function render()
    {
        return view('livewire.ui.cart.overview', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'discount' => Cart::getDiscount(),
            'total' => Cart::getTotal(),
            'itemCount' => Cart::getItemCount(),
        ]);
    }
}
