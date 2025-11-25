<?php

namespace App\View\Components\Shared;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $type;
    public string $class;
    public string $variant;
    public string $id;
    public string $icon;
    public string $placeholder;
    public string $error;

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'text', string $class = '', string $variant = 'admin', string $id = '', string $icon = '', string $placeholder = '', string $error = '')
    {
        $this->type = $type;
        $this->variant = $variant;
        $this->id = $id;
        $this->icon = $icon;
        $this->placeholder = $placeholder;
        $this->error = $error;

        $defaultClasses = match ($variant) {
            'admin' => 'border border-gray-400 focus:border-blue-400 focus:ring focus:ring-blue-400 focus:outline-none transition duration-200 rounded text-[14px] text-gray-700 px-2 py-2 w-full'
        };

        if ($icon) {
            $defaultClasses .= ' pl-8';
        }

        if ($type === 'password') {
            $defaultClasses .= ' pr-8';
        }

        if ($error) {
            $defaultClasses .= ' border-red-400 focus:border-red-400 focus:ring-red-400';
        }

        $this->class = trim($defaultClasses . ' ' . $class);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared.input');
    }
}
