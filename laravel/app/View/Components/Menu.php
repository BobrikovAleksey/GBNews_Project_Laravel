<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;
use Route;

class Menu extends Component
{
    protected array $menu;
    protected array $links;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menu = [
            ['prefix' => '/home', 'link' => '/home', 'name' => 'Home', 'title' => 'Главная страница'],
            ['prefix' => '/news', 'link' => '/news', 'name' => 'News', 'title' => 'Новости', 'submenu' => [
                ['link' => '/news', 'name' => 'Politics', 'title' => 'Политика'],
                ['link' => '/news', 'name' => 'World', 'title' => 'В мире'],
                ['link' => '/news', 'name' => 'Sport', 'title' => 'Спорт'],
            ]],
            ['prefix' => '#', 'link' => '#', 'name' => 'About', 'title' => 'О нас'],
            ['prefix' => '#', 'link' => '#', 'name' => 'Contact Us', 'title' => 'Связаться с нами'],
        ];

        $currentUrl = Route::current()->getCompiled()->getStaticPrefix();
        for ($i = 0; $i < count($this->menu); $i++) {
            $this->menu[$i]['active'] = strripos($currentUrl, $this->menu[$i]['prefix']) === 0;
        }

        $this->links = [
            ['link' => 'https://twitter.com/', 'icon' => '<i class="fab fa-twitter"></i>'],
            ['link' => 'https://www.facebook.com/', 'icon' => '<i class="fab fa-facebook-f"></i>'],
            ['link' => 'https://www.linkedin.com/', 'icon' => '<i class="fab fa-linkedin-in"></i>'],
            ['link' => 'https://www.instagram.com/', 'icon' => '<i class="fab fa-instagram"></i>'],
            ['link' => 'https://www.youtube.com/', 'icon' => '<i class="fab fa-youtube"></i>'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.menu', [
            'menu' => $this->menu,
            'links' => $this->links,
        ]);
    }
}
