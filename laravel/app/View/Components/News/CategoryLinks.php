<?php

namespace App\View\Components\News;

use Closure;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CategoryLinks extends Component
{
    /** @var Eloquent[]|Collection */
    protected $categories;

    /**
     * Create a new component instance.
     *
     * @param Eloquent[]|Collection $categories
     * @return void
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.news.category-links')->with('categories', $this->categories);
    }
}
