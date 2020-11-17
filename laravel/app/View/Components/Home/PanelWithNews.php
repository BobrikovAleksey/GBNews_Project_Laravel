<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class PanelWithNews extends Component
{
    protected array $tabs;

    /**
     * Create a new component instance.
     *
     * @param array $tabs
     * @return void
     */
    public function __construct(array $tabs)
    {
        $this->tabs = $tabs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.home.panel-with-news')->with('tabs', $this->tabs);
    }
}
