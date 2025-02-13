<?php

namespace App\Livewire\Pages\User;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        return view('livewire.pages.user.dashboard-page', [
            'user' => Auth::user(),
        ]);
    }
}
