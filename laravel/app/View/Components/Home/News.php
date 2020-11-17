<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class News extends Component
{
    /**
     * @var News[]|Collection $news
     * @var News[]|Collection $moreNews
     */
    protected $news;
    protected $moreNews;

    /**
     * Create a new component instance.
     *
     * @param News[]|Collection $news
     * @param News[]|Collection $moreNews
     * @return void
     */
    public function __construct($news, $moreNews)
    {
        $this->news = $news;
        $this->moreNews = $moreNews;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.home.news', [
            'news' => $this->news,
            'moreNews' => $this->moreNews,
        ]);
    }
}
