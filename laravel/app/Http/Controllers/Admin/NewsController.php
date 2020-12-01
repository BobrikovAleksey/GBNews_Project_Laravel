<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Str;

class NewsController extends Controller
{
    protected int $newsOnPage;

    public function __construct()
    {
        $this->newsOnPage = config('app.news_on.page');
    }

    /**
     * Возвращает массив с общими данными представлений
     *
     * @return array
     */
    protected function getDataForViews()
    {
        return [
            'title' => 'Панель управления >> Новости',
            'categories' => Category::all(),
        ];
    }

    /**
     * Заполняет новость данными из запроса
     *
     * @param Request $request
     * @return array
     */
    protected function getNewsFromRequest(Request $request)
    {
        $data = $request->only(['title', 'cover', 'author', 'source', 'date', 'body']);
        $data['slug'] = Str::slug($data['title']);

        if (!isset($data['date']) || !strtotime($data['date'])) {
            $data['date'] = Carbon::now();
        }

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.news.index', array_merge($this->getDataForViews(), [
            'newsList' => News::orderByDesc('id')->paginate($this->newsOnPage),
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.news.create', $this->getDataForViews());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['bail', 'required', 'unique:news', 'max:224'],
            'cover' => 'max:256',
            'author' => 'max:128',
            'source' => 'max:128',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $category = Category::find($request->only('category_id'))->first();

        if ($category && News::create($this->getNewsFromRequest($request))->categories()->save($category)) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно добавлена');
        }

        return back()->with('fail', 'Не удалось добавить новость');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Application|Factory|View
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', array_merge($this->getDataForViews(), [
            'news' => $news,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => ['bail', 'required', 'max:224'],
            'cover' => 'max:256',
            'author' => 'max:128',
            'source' => 'max:128',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $category = Category::find($request->only('category_id'))->first();

        $news->fill($this->getNewsFromRequest($request));
        if ($category && $news->save() && $news->categories()->detach() && $news->categories()->save($category)) {
            return redirect()->route('admin.news.index')
                ->with('success', "Новость успешно изменена с #ID {$news->id}");
        }

        return back()->with('fail', "Не удалось изменить новость с #ID {$news->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(News $news)
    {
        if ($news->delete()) {
            return redirect()->route('admin.news.index')
                ->with('success', "Новость успешно удалена с #ID {$news->id}");
        }

        return back()->with('fail', "Не удалось удалить новость с #ID {$news->id}");
    }
}
