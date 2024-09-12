<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SummaryStatistics extends Component
{
    public $title;
    public $indicators;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @param  array  $indicators  Array de indicadores, cada uno con un título, valor y color
     * @return void
     */
    public function __construct($title = null, $indicators = [])
    {
        $this->title = $title;
        $this->indicators = $indicators;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.summary-statistics');
    }
}
