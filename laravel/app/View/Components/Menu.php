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
            ['link' => route('Contact.Index'), 'name' => 'Contact Us', 'title' => 'Связаться с нами'],
        ];

        $currentUrl = request()->getUri();
        for ($i = 0; $i < count($this->menu); $i++) {
            $this->menu[$i]['active'] = strripos($currentUrl, $this->menu[$i]['link']) === 0;
        }
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
        ]);
    }
}
