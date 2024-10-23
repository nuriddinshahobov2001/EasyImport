<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public $id;
    public $size;
    public $title;
    public $isActiveBtnClose;

    /**
     * Create a new component instance.
     */
    public function __construct($size = null,$id = null, $title = null, $isActiveBtnClose = true)
    {
        $this->id = $id;
        $this->size = $size;
        $this->title = $title;
        $this->isActiveBtnClose = $isActiveBtnClose;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
