<?php

namespace App\Livewire\Pages\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DetailsPage extends Component
{
    public string $name = '';
    public string $email = '';
    public string $current_password = '';
    public string $new_password = '';
    public string $new_password_confirmation = '';

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $validated = $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        Auth::user()->update($validated);

        session()->flash('success', 'Profiel succesvol bijgewerkt.');
    }

    public function updatePassword()
    {
        $validated = $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:6|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        session()->flash('success', 'Wachtwoord succesvol bijgewerkt.');
    }

    public function render()
    {
        return view('livewire.pages.account.details-page');
    }
}
