<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LoadingOverlay extends Component
{
    public ?string $target;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $target = null)
    {
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.loading-overlay');
    }
}
