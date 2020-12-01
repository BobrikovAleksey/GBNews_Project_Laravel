<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected int $categoriesOnPage;

    public function __construct()
    {
        $this->categoriesOnPage = config('app.categories_on.page');
    }

    /**
     * Возвращает массив с общими данными представлений
     *
     * @return array
     */
    protected function getDataForViews()
    {
        return [
            'title' => 'Панель управления > Категории новостей',
            'categories' => Category::all(),
        ];
    }

    /**
     * Заполняет категорию данными из запроса
     *
     * @param Request $request
     * @return array
     */
    protected function getCategoryFromRequest(Request $request)
    {
        $data = $request->only(['title', 'description', 'id']);
        $data['slug'] = Str::slug($data['title']);

        return $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.category.index', array_merge($this->getDataForViews(), [
            'categoryList' => Category::paginate($this->categoriesOnPage),
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.category.create', $this->getDataForViews());
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
            'title' => ['bail', 'required', 'unique:categories', 'max:224'],
        ]);

        if (Category::create($this->getCategoryFromRequest($request))) {
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена');
        }

        return back()->with('fail', 'Не удалось добавить категорию');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', array_merge($this->getDataForViews(), [
            'category' => $category,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['bail', 'required', 'max:224'],
        ]);

        $category->fill($this->getCategoryFromRequest($request));
        if ($category->save()) {
            return redirect()->route('admin.category.index')
                ->with('success', "Категория с #ID {$category->id} успешно изменена");
        }

        return back()->with('fail', "Не удалось изменить категорию с #ID {$category->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('admin.category.index')
                ->with('success', "Категория с #ID {$category->id} успешно удалена");
        }

        return back()->with('fail', "Не удалось удалить категорию с #ID {$category->id}");
    }
}
