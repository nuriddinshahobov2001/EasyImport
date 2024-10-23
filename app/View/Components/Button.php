<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function Laravel\Prompts\text;

class Button extends Component
{
    public $type;
    public $class;
    public $text;
    public $position;

    /**
     * Конструктор компонента.
     *
     * @param string $type
     * @param string $class
     */
    public function __construct($type = 'button', $class = '',$position = '', $text = 'I`m button')
    {
        $this->type = $type;
        $this->class = $class;
        $this->text = $text;
        $this->position = $position;
    }

    /**
     * Возвращаем шаблон компонента.
     */
    public function render()
    {
        return view('components.button');
    }
}
