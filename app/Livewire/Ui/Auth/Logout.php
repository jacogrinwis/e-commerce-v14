<?php

namespace App\Livewire\Ui\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    /**
     * Handelt het uitlogproces af
     * - Haalt de huidige URL op uit de header
     * - Controleert of de gebruiker op een beveiligde route is
     * - Logt de gebruiker uit
     * - Maakt de sessie ongeldig
     * - Genereert een nieuw sessie token
     * - Stuurt de gebruiker naar de homepage bij beveiligde routes
     * - Of terug naar de vorige pagina bij openbare routes
     */
    public function logout()
    {
        // $currentUrl = request()->header('Referer');

        // Controleer of huidige pagina een beveiligde route is
        // if (
        //     str_contains($currentUrl, 'admin') ||
        //     str_contains($currentUrl, 'editor') ||
        //     str_contains($currentUrl, 'user')
        // ) {
        //     Auth::logout();
        //     session()->invalidate();
        //     session()->regenerateToken();

        //     return $this->redirect('/'); // Stuurt gebruiker naar homepage
        // }

        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        // return $this->redirect($currentUrl);
        return $this->redirect(route('auth.login'));
    }

    /**
     * Rendert de logout component view
     */
    public function render()
    {
        return view('livewire.ui.auth.logout'); // Stuurt gebruiker terug naar vorige pagina
    }
}
