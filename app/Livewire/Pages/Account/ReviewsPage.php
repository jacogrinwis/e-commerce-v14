<?php

namespace App\Livewire\Pages\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ReviewsPage extends Component
{
    public function deleteReview($reviewId)
    {
        Auth::user()->reviews()->where('id', $reviewId)->delete();
        session()->flash('success', 'Review succesvol verwijderd.');
    }

    public function render()
    {
        return view('livewire.pages.account.reviews-page', [
            'reviews' => Auth::user()->ratings()->with('product')->latest()->get()
        ]);
    }
}
