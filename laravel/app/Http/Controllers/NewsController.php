<?php

namespace App\Http\Controllers;

use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class NewsController extends Controller
{
    protected function getFeaturedTabs(): array
    {
        News::find(1);
        return [
            [
                'link' => 't-featured',
                'title' => 'Избранные',
                'news' => News::query()->orderByDesc('id')->limit(5)->get(),
            ],[
                'link' => 't-popular',
                'title' => 'Популярные',
                'news' => News::query()->orderByDesc('id')->limit(5)->get(),
            ],[
                'link' => 't-latest',
                'title' => 'Последние',
                'news' => News::query()->orderByDesc('id')->limit(5)->get(),
            ]
        ];
    }

    protected function getDataForViews()
    {
        return [
            'categories' => Category::withCount('news')->get(),
            'featuredTabs' => $this->getFeaturedTabs(),
        ];
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * @param string $slug
     * @return Application|Factory|View
     */
    public function show(string $slug)
    {
        $data = $this->getDataForViews();
        $data = array_merge($data, [
            'news' => News::where('slug', $slug)->orderByDesc('id')->first(),
            'relatedNews' => News::query()->orderByDesc('id')->limit(5)->get(),
        ]);
        return view('news.single', $data);
    }
}
