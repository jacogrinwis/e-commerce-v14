<?php

namespace App\Livewire\Ui\Navbar;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class NavFavorites extends Component
{
    #[On('favorites-updated')]
    public function updateFavoriteCount()
    {
        // This will trigger a re-render
        $this->render();
    }

    public function render()
    {
        $favoriteCount = Auth::check() ? Auth::user()->favorites()->count() : 0;

        return view('livewire.ui.navbar.nav-favorites', [
            'favoriteCount' => $favoriteCount
        ]);
    }
}
