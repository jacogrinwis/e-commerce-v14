<?php

namespace App\Livewire\Pages\Cart;

use App\Facades\Cart;
use Livewire\Component;
use Livewire\Attributes\On;

/**
 * Livewire component voor de winkelwagen pagina
 * Beheert alle winkelwagen functionaliteit zoals items toevoegen, verwijderen en bijwerken
 */
class ShoppingCartPage extends Component
{
    /**
     * Luistert naar het cart-updated event en vernieuwt het overzicht
     * Wordt aangeroepen wanneer er wijzigingen in de winkelwagen zijn
     */
    #[On('cart-updated')]
    public function updateOverview()
    {
        // This will trigger a re-render
        $this->render();
    }

    /**
     * Verwijdert een item uit de winkelwagen
     * Verstuurt events om de winkelwagen en favorieten bij te werken
     * @param int $productId Het ID van het product dat verwijderd moet worden
     */
    public function removeItem($productId)
    {
        Cart::removeFromCart($productId);
        $this->dispatch('cart-updated');
        $this->dispatch('favorite-updated');
    }

    /**
     * Werkt de hoeveelheid van een product in de winkelwagen bij
     * Verstuurt events om de winkelwagen en favorieten bij te werken
     * @param int $productId Het ID van het product
     * @param int $quantity De nieuwe hoeveelheid
     */
    public function updateQuantity($productId, $quantity)
    {
        Cart::updateQuantity($productId, $quantity);
        $this->dispatch('cart-updated');
        $this->dispatch('favorite-updated');
    }

    /**
     * Rendert de winkelwagen pagina met alle benodigde data
     * Haalt actuele winkelwagen items, subtotaal en aantal items op
     */
    public function render()
    {
        return view('livewire.pages.cart.shopping-cart-page', [
            'cartItems' => Cart::getCartItems(),
            'subtotal' => Cart::getSubtotal(),
            'itemCount' => Cart::getItemCount(),
        ]);
    }
}
