<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Menu extends Component
{
    protected array $newsMenu = [];
    protected array $activeMenuItem = [];

    /**
     * Create a new component instance.
     *
     * @param Category[]|Eloquent[]|Collection $categories
     * @return void
     */
    public function __construct($categories)
    {
        $this->newsMenu = [['link' => route('news.index'), 'title' => 'Все новости'], []];
        foreach ($categories as $category) {
            $this->newsMenu[] = [
                'link' => route('news.category', $category->slug),
                'title' =>  $category->title,
            ];
        }

        $currentUrl = request()->getUri();
        $this->activeMenuItem = [
            route('home') => strripos($currentUrl, route('home')) === 0,
            route('news.index') => strripos($currentUrl, route('news.index')) === 0,
            route('feedback.index') => strripos($currentUrl, route('feedback.index')) === 0,
            route('admin.category.index') => strripos($currentUrl, route('admin.category.index')) === 0,
            route('admin.feedback.index') => strripos($currentUrl, route('admin.feedback.index')) === 0,
            route('admin.news.index') => strripos($currentUrl, route('admin.news.index')) === 0,
            route('admin.source.index') => strripos($currentUrl, route('admin.source.index')) === 0,
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
            'newsMenu' => $this->newsMenu,
            'activeMenuItem' => $this->activeMenuItem,
        ]);
    }
}
