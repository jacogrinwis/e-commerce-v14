<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownButton extends Component
{
    public function __construct(public string $dropdownName) {}

    public function render(): View|Closure|string
    {
        return view('components.navbar.dropdown-button');
    }
}
