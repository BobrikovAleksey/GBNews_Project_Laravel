<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\RedirectResponse;

class NewsController extends Controller
{
    protected int $newsOnPage;
    protected int $newsOnRelated;
    protected int $newsOnSidebarPanel;

    public function __construct()
    {
        $this->newsOnPage = config('app.news_on.page');
        $this->newsOnRelated = config('app.news_on.related_panel');
        $this->newsOnSidebarPanel = config('app.news_on.sidebar_panel_with_tabs');
    }

    /**
     * Возвращает общие данные для представлений
     *
     * @return array
     */
    protected function getDataForViews(): array
    {
        return [
            'title' => 'Новости',
            'categories' => Category::withCount('news')->get(),
            'featuredTabs' => $this->getFeaturedTabs(),
        ];
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
                'news' => News::query()->orderByDesc('id')->limit($this->newsOnSidebarPanel)->get(),
            ],[
                'link' => 't-popular',
                'title' => 'Популярные',
                'news' => News::query()->orderByDesc('id')->limit($this->newsOnSidebarPanel)->get(),
            ],[
                'link' => 't-latest',
                'title' => 'Последние',
                'news' => News::query()->orderByDesc('id')->limit($this->newsOnSidebarPanel)->get(),
            ]
        ];
    }

    /**
     * Выводит все новости или новости из определенной категории
     *
     * @param string|null $categorySlug
     * @return Application|Factory|View
     */
    public function index($categorySlug = null)
    {
        if (isset($categorySlug)) {
            $category = Category::firstWhere('slug', $categorySlug);
        }

        if (isset($category)) {
            $news = $category->news()->orderByDesc('id')->paginate($this->newsOnPage);
        } else {
            $news = News::orderByDesc('id')->paginate($this->newsOnPage);
        }

        $data = array_merge($this->getDataForViews(), [
            'category' => $category ?? null,
            'news' => $news,
        ]);

        if (isset($category)) {
            $data = array_merge($data, [
                'breadcrumbs' => [
                    'name' => 'home-news-category',
                    'category' => $category,
                ],
            ]);

        } else {
            $data = array_merge($data, [ 'breadcrumbs' => [ 'name' => 'home-news' ] ]);
        }

        return view('news.index', $data);
    }

    /**
     * Выводит определенную новость
     *
     * @param string $slug
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(string $slug)
    {
        $data = array_merge($this->getDataForViews(), [
            'news' => News::where('slug', $slug)->orderByDesc('id')->first(),
            'relatedNews' => News::query()->orderByDesc('id')->limit($this->newsOnRelated)->get(),
        ]);

        if (isset($data['news'])) {
            $data = array_merge($data, [
                'breadcrumbs' => [
                    'name' => 'home-news-show',
                    'news' => $data['news'],
                ],
            ]);

            return view('news.single', $data);
        }

        return redirect()->route('news.index');
    }
}
