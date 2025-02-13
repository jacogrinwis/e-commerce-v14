<?php

namespace App\Livewire\Ui\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public string $email = 'admin@example.com';
    public string $password = 'password';
    public bool $remember = false;

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

            return $this->redirect($currentUrl);
        }

        $this->addError('email', 'Onjuiste inloggegevens.');
    }

    public function render()
    {
        return view('livewire.ui.auth.login');
    }
}
