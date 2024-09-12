<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $sectionName;
    public $description;
    public $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @param  string  $sectionName
     * @param  string  $description
     * @param  array  $breadcrumbs
     * @return void
     */
    public function __construct($sectionName, $description = '', $breadcrumbs = [])
    {
        $this->sectionName = $sectionName;
        $this->description = $description;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
