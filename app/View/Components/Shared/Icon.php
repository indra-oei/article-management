<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Icon extends Component
{
    public string $name;
    public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(string $name = '', string $class = '')
    {
        $this->name = $name;
        $this->class = 'flex items-center justify-center h-[16px] w-[16px] text-gray-500 ' . $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.icon');
    }
}
