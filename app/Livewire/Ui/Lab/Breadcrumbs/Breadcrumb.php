<?php

namespace App\Livewire\Ui\Lab\Breadcrumbs;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $trails;

    public function render()
    {
        return view('livewire.ui.lab.breadcrumbs.breadcrumb');
    }
}
