<?php

namespace App\Livewire\Pages\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class FavoritesPage extends Component
{
    public function render()
    {
        return view('livewire.pages.account.favorites-page', [
            'favorites' => Auth::user()->favoriteProducts()->with('category')->get()
        ]);
    }
}
