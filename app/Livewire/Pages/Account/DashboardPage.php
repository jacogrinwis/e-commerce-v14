<?php

namespace App\Livewire\Pages\Account;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        return view('livewire.pages.account.dashboard-page', [
            'user' => Auth::user(),
        ]);
    }
}
