<?php

namespace App\Http\Controllers;

use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

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
            'title' => 'Новости',
            'categories' => Category::withCount('news')->get(),
            'featuredTabs' => $this->getFeaturedTabs(),
        ];
    }

    /**
     * @param string|null $categorySlug
     * @return Application|Factory|View
     */
    public function index($categorySlug = null)
    {
        if (isset($categorySlug)) {
            $category = Category::firstWhere('slug', $categorySlug);
        }

        if (isset($category)) {
            $news = $category->news()->orderByDesc('id')->paginate(10);
        } else {
            $news = News::orderByDesc('id')->paginate(10);
        }

        $data = $this->getDataForViews();
        $data = array_merge($data, [
            'category' => $category ?? null,
            'news' => $news,
        ]);
        return view('news.index', $data);
    }

    /**
     * @param string $slug
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(string $slug)
    {
        $data = $this->getDataForViews();
        $data = array_merge($data, [
            'news' => News::where('slug', $slug)->orderByDesc('id')->first(),
            'relatedNews' => News::query()->orderByDesc('id')->limit(5)->get(),
        ]);

        if (isset($data['news'])) {
            return view('news.single', $data);
        }

        return redirect()->route('News.Index');
    }
}
