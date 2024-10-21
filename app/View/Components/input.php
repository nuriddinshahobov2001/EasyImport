<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class input extends Component
{
    public $type;
    public $placeholder;
    public $icon;
    public $showIcon;
    public $name;
    public $required;

    /**
     * Конструктор компонента.
     *
     * @param string $type
     * @param string $placeholder
     * @param string $icon
     * @param bool $showIcon
     * @param string $name
     */
    public function __construct($type = 'text', $placeholder = 'Enter text', $icon = 'fas fa-lock', $showIcon = true, $name = '',$required = true)
    {
        $this->type = $type;
        $this->placeholder = $placeholder;
        $this->icon = $icon;
        $this->showIcon = $showIcon;
        $this->name = $name;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.input');
    }
}
