<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notification extends Component
{
    public $type;
    public $title;
    public $message;
    public $dismissible;
    public $titleFontSize;
    public $bodyFontSize;
    public $footerFontSize;
    public $footer;

    /**
     * Create a new component instance.
     *
     * @param  string  $type (e.g., 'success', 'error', 'warning', 'info')
     * @param  string|null  $title
     * @param  string  $message
     * @param  bool  $dismissible (whether the notification can be dismissed)
     * @param  string  $titleFontSize (e.g., 'text-xl', 'text-2xl')
     * @param  string  $bodyFontSize (e.g., 'text-base', 'text-sm')
     * @param  string  $footerFontSize (e.g., 'text-sm', 'text-xs')
     * @param  string|null  $footer
     * @return void
     */
    public function __construct(
        $type = 'info', 
        $title = null, 
        $message = '', 
        $dismissible = true,
        $titleFontSize = 'text-lg',
        $bodyFontSize = 'text-base',
        $footerFontSize = 'text-sm',
        $footer = null
    )
    {
        $this->type = $type;
        $this->title = $title;
        $this->message = $message;
        $this->dismissible = $dismissible;
        $this->titleFontSize = $titleFontSize;
        $this->bodyFontSize = $bodyFontSize;
        $this->footerFontSize = $footerFontSize;
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.notification');
    }
}
