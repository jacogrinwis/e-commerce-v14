<?php

namespace App\Livewire\Pages\Auth;

use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

/**
 * Livewire component voor de login pagina
 * Handelt het inlogproces af en beheert de winkelwagen overgang van gast naar gebruiker
 */
class LoginPage extends Component
{
    /**
     * Email veld met standaard test waarde
     */
    public string $email = 'admin@example.com';

    /**
     * Wachtwoord veld met standaard test waarde
     */
    public string $password = 'password';

    /**
     * "Onthoud mij" checkbox status
     */
    public bool $remember = false;

    /**
     * Handelt het inlogproces af
     * - Valideert de ingevoerde gegevens
     * - Probeert de gebruiker in te loggen
     * - Voegt gast winkelwagen samen met gebruiker winkelwagen
     * - Stuurt gebruiker terug naar vorige pagina bij succes
     */
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $currentUrl = request()->header('Referer');

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            $this->reset(['email', 'password', 'remember']);

            Cart::mergeGuestCartWithUserCart();

            return $this->redirect($currentUrl);
        }

        $this->addError('email', 'Onjuiste inloggegevens.');
    }

    /**
     * Rendert de login pagina view
     */
    public function render()
    {
        return view('livewire.pages.auth.login-page');
    }
}
