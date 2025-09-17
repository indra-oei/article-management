<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $type;
    public string $class;
    public string $variant;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'button', string $class = '', string $variant = 'default')
    {
        $this->type = $type;
        $this->variant = $variant;

        $defaultClasses = match ($variant) {
            'primary' => 'bg-blue-900 hover:bg-indigo-900 text-white text-sm py-2 px-4 rounded',
            'secondary' => 'bg-gray-500 hover:bg-gray-700 text-white text-sm py-2 px-4 rounded',
            'danger' => 'bg-red-500 hover:bg-red-700 text-white text-sm py-2 px-4 rounded',
        };

        $this->class = trim($defaultClasses . ' ' . $class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.button');
    }
}
