<?php

namespace App\View\Components\News;

use Closure;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\{Collection, Model};
use Illuminate\View\Component;

class NewsList extends Component
{
    /**
     * @var Eloquent|Eloquent[]|Collection|Model|null $category
     * @var Eloquent|Eloquent[]|Collection|Model|null $news
     */
    protected $category;
    protected $news;

    /**
     * Create a new component instance.
     *
     * @param Eloquent|Eloquent[]|Collection|Model|null $category
     * @param Eloquent|Eloquent[]|Collection|Model|null $news
     * @return void
     */
    public function __construct($category, $news)
    {
        $this->category = $category;
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.news.news-list')
            ->with('category', $this->category)
            ->with('news', $this->news);
    }
}
