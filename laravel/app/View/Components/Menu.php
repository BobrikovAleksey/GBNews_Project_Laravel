<?php

namespace App\View\Components;

use Closure;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Menu extends Component
{
    protected array $menu;
    protected array $links;

    /**
     * Create a new component instance.
     *
     * @param Eloquent[]|Collection $categories
     * @return void
     */
    public function __construct($categories)
    {
        $newsMenu = [['link' => route('News.Index'), 'name' => 'All News', 'title' => 'Все новости'], []];
        foreach ($categories as $category) {
            $newsMenu[] = [
                'link' => route('News.Category', $category->slug),
                'name' =>  $category->name,
                'title' =>  $category->title,
            ];
        }

        $this->menu = [
            ['link' => route('Home'), 'name' => 'Home', 'title' => 'Главная страница'],
            ['link' => route('News.Index'), 'name' => 'News', 'title' => 'Новости', 'submenu' => $newsMenu],
            ['link' => '#', 'name' => 'About', 'title' => 'О нас'],
            ['link' => '#', 'name' => 'Contact Us', 'title' => 'Связаться с нами'],
        ];

        $currentUrl = request()->getUri();
        for ($i = 0; $i < count($this->menu); $i++) {
            $this->menu[$i]['active'] = strripos($currentUrl, $this->menu[$i]['link']) === 0;
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
