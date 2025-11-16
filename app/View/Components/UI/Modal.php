<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public string $show;
    public string $title;
    public string $subtitle;

    /**
     * Create a new component instance.
     */
    public function __construct(string $show = '', string $title = '', string $subtitle = '')
    {
        $this->show = $show;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.modal');
    }
}
