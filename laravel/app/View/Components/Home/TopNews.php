<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\View\Components\Home;

use App\Models\News;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class TopNews extends Component
{
    /** @var News[]|Collection */
    protected $news;

    /**
     * Create a new component instance.
     *
     * @param News[]|Collection $news
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
        return view('components.home.top-news')->with('news', $this->news);
    }
}
