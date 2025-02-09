<?php

namespace App\Livewire\Ui\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }

        $this->addError('email', 'Onjuiste inloggegevens.');
    }
    public function render()
    {
        return view('livewire.ui.auth.login');
    }
}
