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
    public string $size;
    public string $icon;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'button', string $class = '', string $variant = 'primary', string $size = 'medium', string $icon = '')
    {
        $this->type = $type;
        $this->variant = $variant;
        $this->size = $size;
        $this->icon = $icon;

        $defaultClasses = match ($variant) {
            'primary' => 'flex items-center gap-1 bg-indigo-100 hover:bg-indigo-200 text-indigo-700 font-medium rounded transition duration-200 cursor-pointer',
            'secondary' => 'flex items-center gap-1 bg-gray-500 hover:bg-gray-700 text-white font-medium rounded transition duration-200 cursor-pointer',
            'danger' => 'flex items-center gap-1 bg-red-100 hover:bg-red-200 text-red-700 font-medium rounded transition duration-200 cursor-pointer',
        };

        $sizeClasses = match ($size) {
            'large' => 'py-2 px-4 text-sm',
            'medium' => 'py-2 px-4 text-xs',
            'small' => 'py-1 px-2 text-xs'
        };

        $this->class = trim($defaultClasses . ' ' . $sizeClasses . ' ' . $class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.button');
    }
}
