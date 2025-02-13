<?php

namespace App\Livewire\Ui\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        $currentUrl = request()->header('Referer');

        // Check if current page is restricted
        if (str_contains($currentUrl, 'admin') || str_contains($currentUrl, 'profile')) {
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();

            return $this->redirect($currentUrl);
        }

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirect($currentUrl);
    }

    public function render()
    {
        return view('livewire.ui.auth.logout');
    }
}
