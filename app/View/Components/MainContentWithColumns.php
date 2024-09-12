<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MainContentWithColumns extends Component
{
    public $title;
    public $titleAlignment;
    public $columnCount;

    /**
     * Create a new component instance.
     *
     * @param  string|null  $title
     * @param  string  $titleAlignment ('left' or 'right')
     * @param  int  $columnCount (Número de columnas, entre 2 y 4)
     * @return void
     */
    public function __construct($title = null, $titleAlignment = 'left', $columnCount = 2)
    {
        $this->title = $title;
        $this->titleAlignment = $titleAlignment;
        $this->columnCount = max(2, min(4, $columnCount)); // Asegurarse de que el valor esté entre 2 y 4
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-content-with-columns');
    }
}
