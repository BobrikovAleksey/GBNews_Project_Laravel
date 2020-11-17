<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
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
        $this->menu = [
            [ 'link' => '#', 'name' => 'About', 'title' => 'О нас' ],
            [ 'link' => '#', 'name' => 'Privacy', 'title' => 'Конфиденциальность' ],
            [ 'link' => '#', 'name' => 'Terms', 'title' => 'Термины' ],
            [ 'link' => '#', 'name' => 'Contact', 'title' => 'Связаться с нами' ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.top-bar', [
            'email' => $this->email,
            'phone' => $this->phone,
            'menu' => $this->menu,
        ]);
    }
}
