<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $titleBackgroundColor;
    public $textAlignment;
    public $icon;
    public $footer;
    public $size;
    public $titleFontSize;
    public $bodyFontSize;
    public $footerFontSize;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @param  string|null  $titleBackgroundColor
     * @param  string  $textAlignment ('left', 'center', or 'right')
     * @param  string|null  $icon
     * @param  string|null  $footer
     * @param  string  $size
     * @param  string  $titleFontSize (e.g., 'text-xl', 'text-2xl')
     * @param  string  $bodyFontSize (e.g., 'text-base', 'text-sm')
     * @param  string  $footerFontSize (e.g., 'text-sm', 'text-xs')
     * @return void
     */
    public function __construct(
        $title = null, 
        $titleBackgroundColor = null, 
        $textAlignment = 'left', 
        $icon = null, 
        $footer = null, 
        $size = 'md',
        $titleFontSize = 'text-xl',
        $bodyFontSize = 'text-base',
        $footerFontSize = 'text-sm'
    )
    {
        $this->title = $title;
        $this->titleBackgroundColor = $titleBackgroundColor;
        $this->textAlignment = $textAlignment;
        $this->icon = $icon;
        $this->footer = $footer;
        $this->size = $size;
        $this->titleFontSize = $titleFontSize;
        $this->bodyFontSize = $bodyFontSize;
        $this->footerFontSize = $footerFontSize;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
