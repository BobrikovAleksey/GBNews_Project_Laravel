<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class HomeController extends Controller
{
    protected int $newsOnPage;
    protected int $newsOnRelated;
    protected int $newsOnSidebarPanel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');

        $this->newsOnPage = config('app.news_on.page');
        $this->newsOnRelated = config('app.news_on.related_panel');
        $this->newsOnSidebarPanel = config('app.news_on.sidebar_panel_with_tabs');
    }

    /**
     * Возвращает новости для панели с избранными новостями
     *
     * @return array[]
     */
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

    /**
     * Возвращает новости для панели с наиболее ... новостями
     *
     * @return array[]
     */
    protected function getMostTabs(): array
    {
        return [
            [
                'link' => 't-viewed',
                'title' => 'Наиболее просматриваемые',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-read',
                'title' => 'Наиболее читаемые',
                'news' => News::query()->orderByDesc('id')->limit(3)->get(),
            ],[
                'link' => 't-recent',
                'title' => 'Наиболее свежие',
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
            'categories' => Category::all(),
            'topNews' => News::query()->orderByDesc('id')->limit(8)->get(),
            'featuredTabs' => $this->getFeaturedTabs(),
            'mostTabs' => $this->getMostTabs(),
            'news' => News::query()->orderByDesc('id')->limit(9)->get(),
            'moreNews' => News::query()->orderByDesc('id')->limit(12)->get(),
        ]);
    }
}
