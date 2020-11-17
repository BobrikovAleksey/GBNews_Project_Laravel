<?php

namespace App\Http\Controllers;

use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    protected function getFeaturedTabs(): array
    {
        return [
            [
                'link' => 't-featured',
                'title' => 'Избранные',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-popular',
                'title' => 'Популярные',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-latest',
                'title' => 'Последние',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ]
        ];
    }

    protected function getMostTabs(): array
    {
        return [
            [
                'link' => 't-viewed',
                'title' => 'Самые просматриваемые',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-read',
                'title' => 'Самые читаемые',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-recent',
                'title' => 'Самые свежие',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ]
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
//        return view('home');
        return view('index', [
            'title' => 'Главная страница',
            'categories' => Category::select(['id', 'title'])->orderBy('id')->get(),
            'topNews' => News::query()->orderByDesc('id')->limit(8)->get(),
            'featuredTabs' => $this->getFeaturedTabs(),
            'mostTabs' => $this->getMostTabs(),
            'news' => News::query()->orderByDesc('id')->limit(9)->get(),
            'moreNews' => News::query()->orderByDesc('id')->limit(12)->get(),
        ]);
    }
}
