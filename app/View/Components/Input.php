<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $id;
    public $placeholder;
    public $icon;
    public $showIcon;
    public $name;
    public $required;
    public $label;
    public $value;
    public $disabled;



    public function __construct($type = 'text',$value = '',$disabled=true,$id = '', $placeholder = 'Enter text', $icon = 'fas fa-lock', $showIcon = true, $name = '',$required = true, $label='')
    {
        $this->type = $type;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->showIcon = $showIcon;
        $this->name = $name;
        $this->required = $required;
        $this->label = $label;
        $this->value = $value;
        $this->disabled = $disabled;
    }

    public function render()
    {
        return view('components.input');
    }
}
