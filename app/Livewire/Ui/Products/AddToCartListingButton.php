<?php

namespace App\Livewire\Ui\Products;

use App\Facades\Cart;
use Livewire\Component;

class AddToCartListingButton extends Component
{
    public $productId;
    public $disabled = false;

    public function addToCart($productId)
    {
        Cart::addToCart($productId);
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.ui.products.add-to-cart-listing-button');
    }
}
