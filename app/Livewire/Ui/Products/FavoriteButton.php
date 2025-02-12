<?php

namespace App\Livewire\Ui\Products;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoriteButton extends Component
{
    public Product $product;
    public bool $isFavorited = false;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->isFavorited = Auth::check() ? Auth::user()->favoriteProducts->contains($this->product->id) : false;
    }

    public function toggleFavorite()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isFavorited) {
            Auth::user()->favorites()->where('product_id', $this->product->id)->delete();
        } else {
            Auth::user()->favorites()->create([
                'product_id' => $this->product->id
            ]);
        }

        $this->isFavorited = !$this->isFavorited;
    }

    public function render()
    {
        return view('livewire.ui.products.favorite-button');
    }
}
