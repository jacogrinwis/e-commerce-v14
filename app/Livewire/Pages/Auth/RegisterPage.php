<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use App\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterPage extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        Cart::mergeGuestCartWithUserCart();

        return $this->redirect(route('account.dashboard'));
    }

    public function render()
    {
        return view('livewire.pages.auth.register-page');
    }
}
