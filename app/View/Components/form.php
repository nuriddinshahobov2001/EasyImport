<?php
namespace App\View\Components;

use Illuminate\View\Component;

class form extends Component
{
    public $method;
    public $action;
    public $multipart;

    /**
     * Конструктор компонента.
     *
     * @param string $method
     * @param string $action
     * @param bool $multipart
     */
    public function __construct($method = 'POST', $action = '', $multipart = false)
    {
        $this->method = strtoupper($method);  // Приводим метод к верхнему регистру
        $this->action = $action;
        $this->multipart = $multipart;
    }

    /**
     * Возвращаем шаблон компонента.
     */
    public function render()
    {
        return view('components.form');
    }
}
