<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavItem extends Component
{
    public $mainUrl; // Главный URL для перехода
    public $checkUrls; // Массив URL для проверки
    public $icon;
    public $label;

    public function __construct($mainUrl, array $checkUrls, $icon, $label)
    {
        $this->mainUrl = $mainUrl; // Инициализация главного URL
        $this->checkUrls = $checkUrls; // Инициализация массива URL для проверки
        $this->icon = $icon;
        $this->label = $label;
    }

    public function isActive()
    {
        // Проверяем, соответствует ли текущий URL любому из массивов для проверки
        foreach ($this->checkUrls as $url) {
            if (request()->is($url)) {
                return 'active'; // Если соответствует, возвращаем класс active
            }
        }
        return ''; // Если не соответствует, возвращаем пустую строку
    }

    public function render()
    {
        return view('components.nav-item')->with([
            'activeClass' => $this->isActive(), // Передаем класс активности в представление
        ]);
    }
}
