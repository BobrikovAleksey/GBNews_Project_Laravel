<?php

namespace App\View\Components\News;

use Closure;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\{Collection, Model};
use Illuminate\View\Component;

class News extends Component
{
    /** @var Eloquent|Eloquent[]|Collection|Model|null */
    protected $news;

    /**
     * Create a new component instance.
     *
     * @param Eloquent|Eloquent[]|Collection|Model|null $news
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.news.news')->with('news', $this->news);
    }
}
