<?php

namespace App\View\Components\Layout\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    public string $class;
    public string $href;
    public string $icon;
    public string $iconClass;
    public bool $isOpen;

    /**
     * Create a new component instance.
     */
    public function __construct(string $class = '', string $iconClass = '',  bool $isOpen = false, string $href = '#', string $icon = 'home')
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->isOpen = $isOpen;

        $activeStyle = match ($isOpen) {
            true => 'bg-indigo-100 text-violet-500 font-medium ',
            false => 'text-gray-600 font-medium '
        };

        $this->class = 'mb-2 last:mb-0 rounded-md ' . $activeStyle . $class;

        $this->iconClass = match ($isOpen) {
            true => 'text-inherit stroke-[2.5]',
            false => 'text-gray-400 stroke-[2.5]',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.admin.nav-link');
    }
}
