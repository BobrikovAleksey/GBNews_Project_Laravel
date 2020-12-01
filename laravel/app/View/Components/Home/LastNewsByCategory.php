<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\View\Components\Home;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class LastNewsByCategory extends Component
{
    protected int $categoryId;

    /**
     * Create a new component instance.
     *
     * @param int $categoryId
     */
    public function __construct(int $categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.home.last-news-by-category')
            ->with('news', Category::find($this->categoryId)->news()->orderByDesc('id')->limit(3)->get());
    }
}
