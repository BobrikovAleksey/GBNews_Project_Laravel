<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class TopBar extends Component
{
    protected string $email;
    protected string $phone;
    protected array $menu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->email = 'bobrikov.aleksey.1987@ya.ru';
        $this->phone = '+7 (921) 787-25-16';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Closure|Application|Htmlable|Factory|View|string
     */
    public function render()
    {
        return view('components.top-bar', [
            'email' => $this->email,
            'phone' => $this->phone,
        ]);
    }
}
