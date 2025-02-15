<?php

namespace App\Livewire\Ui\Cart;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

/**
 * Livewire component voor de favorieten knop functionaliteit
 * Maakt het mogelijk om producten als favoriet te markeren voor ingelogde gebruikers
 */
class FavoriteButton extends Component
{
    /**
     * ID van het product waarvoor deze favoriet knop is
     */
    public $productId;

    /**
     * Houdt bij of het huidige product een favoriet is van de gebruiker
     */
    public bool $isFavorited = false;

    /**
     * Wordt uitgevoerd bij initialisatie van de component
     * Controleert of het product een favoriet is voor de ingelogde gebruiker
     */
    public function mount()
    {
        $this->isFavorited = Auth::check() ? Auth::user()->favoriteProducts->contains($this->productId) : false;
    }

    /**
     * Schakelt de favoriet status van een product om
     * - Voor niet-ingelogde gebruikers: redirect naar login pagina
     * - Voor ingelogde gebruikers: voegt toe/verwijdert uit favorieten
     * Stuurt een event uit wanneer de favorietenstatus verandert
     */
    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isFavorited) {
            Auth::user()->favorites()->where('product_id', $this->productId)->delete();
        } else {
            Auth::user()->favorites()->create([
                'product_id' => $this->productId
            ]);
        }

        $this->isFavorited = !$this->isFavorited;

        // Dispatch event when favorites change
        $this->dispatch('favorites-updated');
    }

    /**
     * Rendert de component view met de favoriet knop
     */
    public function render()
    {
        return view('livewire.ui.cart.favorite-button');
    }
}
