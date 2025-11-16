<?php

namespace App\View\Components\UI;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    public array $headers;
    public array $rows;
    public string $editEvent;
    public string $deleteMethod;
    public string $deleteObjectLabel;

    /**
     * Create a new component instance.
     */
    public function __construct(array $headers = [], array $rows = [], string $editEvent = 'editItem', string $deleteMethod = 'deleteItem', string $deleteObjectLabel = 'item')
    {
        $this->headers = array_merge(['no' => 'No'], $headers, ['action' => 'Action']);
        $this->rows = $rows;
        $this->editEvent = $editEvent;
        $this->deleteMethod = $deleteMethod;
        $this->deleteObjectLabel = $deleteObjectLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.table');
    }
}
