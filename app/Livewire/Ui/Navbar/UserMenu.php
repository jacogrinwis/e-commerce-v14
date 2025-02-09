<?php

namespace App\Livewire\Ui\Navbar;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserMenu extends Component
{
    public function render()
    {
        return view('livewire.ui.navbar.user-menu', [
            'user' => Auth::user(),
        ]);
    }
}
