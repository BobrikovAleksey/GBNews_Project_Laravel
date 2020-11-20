<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    protected array $breadcrumbs = [];

    /**
     * Create a new component instance.
     *
     * @param array $breadcrumbs
     * @return void
     */
    public function __construct(array $breadcrumbs)
    {
        $links = [
            'home' => [ 'link' => route('home'), 'title' => 'Главная страница' ],
            'news' => [ 'link' => route('news.index'), 'title' => 'Новости' ],
        ];

        switch ($breadcrumbs['name']) {
            case 'home-contact':
                $this->breadcrumbs = [
                    $links['home'],
                    [ 'link' => '#', 'title' => 'Форма связи' ],
                ];
                return;

            case 'home-news':
                $this->breadcrumbs = [
                    $links['home'],
                    $links['news'],
                ];
                return;

            case 'home-news-category':
                $this->breadcrumbs = [
                    $links['home'],
                    $links['news'],
                    [
                        'link' => route('news.category', $breadcrumbs['category']->slug ?? '#'),
                        'title' => $breadcrumbs['category']->title ?? 'Категория',
                    ],
                ];
                return;

            case 'home-news-show':
                $categories = $breadcrumbs['news']->categories[0];
                $this->breadcrumbs = [
                    $links['home'],
                    $links['news'],
                    [
                        'link' => route('news.category', $categories->slug ?? '#'),
                        'title' => $categories->title ?? 'Категория',
                    ],
                    [
                        'link' => route('news.show', $breadcrumbs['news']->slug ?? '#'),
                        'title' => 'Новость' . (isset($breadcrumbs['news']->id) ? ' №' . $breadcrumbs['news']->id : ''),
                    ],
                ];
                return;

            default:
                $this->breadcrumbs = [];
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.breadcrumbs')->with('breadcrumbs', $this->breadcrumbs);
    }
}
