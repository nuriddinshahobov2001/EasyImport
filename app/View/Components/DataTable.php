<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $model;
    public $headers;
    public $fields;
    public $action;
    public $icons;
    public $routes;

    public function __construct(array $headers, $model, array $fields, bool $action = false, array $icons = [], array $routes = [])
    {
        $this->headers = $headers;
        $this->model = $model;
        $this->fields = $fields;
        $this->action = $action;
        $this->icons = $icons;
        $this->routes = $routes;
    }

    public function render()
    {
        return view('components.data-table');
    }
}
