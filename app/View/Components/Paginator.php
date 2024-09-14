<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class Paginator extends Component
{
    public $paginator;

    /**
     * Create a new component instance.
     *
     * @param LengthAwarePaginator $paginator
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.paginator');
    }
}
