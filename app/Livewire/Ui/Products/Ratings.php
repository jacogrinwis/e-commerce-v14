<?php

namespace App\Livewire\Ui\Products;

use App\Models\Rating;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Ratings extends Component
{
    public $product;
    public $rating = 0;
    public $comment = '';

    public function mount($product)
    {
        $this->product = $product;
        // Get user's previous rating if exists
        if (Auth::check()) {
            $userRating = Rating::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->first();
            if ($userRating) {
                $this->rating = $userRating->rating;
                $this->comment = $userRating->comment;
            }
        }
    }

    public function rate()
    {
        $this->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255'
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $this->product->id
            ],
            [
                'rating' => $this->rating,
                'comment' => $this->comment
            ]
        );

        $this->dispatch('rated', productId: $this->product->id);
    }

    public function render()
    {
        return view('livewire.ui.products.ratings');
    }
}
