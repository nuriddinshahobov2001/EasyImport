<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;
    public $breadcrumbs;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param array $breadcrumbs
     */
    public function __construct($title, array $breadcrumbs = [])
    {
        $this->title = $title;
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.page-header');
    }
}
