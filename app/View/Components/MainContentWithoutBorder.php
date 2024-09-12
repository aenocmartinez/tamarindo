<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainContentWithoutBorder extends Component
{
    public $title;
    public $titleAlignment;
    public $titleColor;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @param  string  $titleAlignment ('left' or 'right')
     * @param  string|null  $titleColor (color class, e.g., 'text-gray-600' or 'text-orange-500')
     * @return void
     */
    public function __construct($title = null, $titleAlignment = 'left', $titleColor = null)
    {
        $this->title = $title;
        $this->titleAlignment = $titleAlignment;
        $this->titleColor = $titleColor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-content-without-border');
    }
}
