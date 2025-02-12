<?php

namespace App\View\Components\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DrawerMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $position = 'left',
        public string $title = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar.drawer-menu');
    }
}
