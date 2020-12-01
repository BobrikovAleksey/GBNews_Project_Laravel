<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Source};
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};

class SourceController extends Controller
{
    protected int $sourcesOnPage;

    public function __construct()
    {
        $this->sourcesOnPage = config('app.sources_on.page');
    }

    /**
     * Возвращает массив с общими данными представлений
     *
     * @return array
     */
    protected function getDataForViews()
    {
        return [
            'title' => 'Панель управления > Источники новостей',
            'categories' => Category::all(),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.source.index', array_merge($this->getDataForViews(), [
            'sourceList' => Source::paginate($this->sourcesOnPage),
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.source.create', $this->getDataForViews());
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
            'category_id' => ['required'],
            'name' => ['bail', 'required', 'unique:sources', 'max:128'],
            'link' => ['bail', 'required', 'max:256'],
        ]);

        $data = $request->only(['category_id', 'name', 'link']);
        if (Source::create($data)) {
            return redirect()->route('admin.source.index')->with('success', 'Источник новостей успешно добавлен');
        }

        return back()->with('fail', 'Не удалось добавить источник новостей');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return Application|Factory|View
     */
    public function edit(Source $source)
    {
        return view('admin.source.edit', array_merge($this->getDataForViews(), [
            'source' => $source,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(Request $request, Source $source)
    {
        $request->validate([
            'category_id' => ['required'],
            'name' => ['bail', 'required', 'max:128'],
            'link' => ['bail', 'required', 'max:256'],
        ]);

        $data = $request->only(['category_id', 'name', 'link']);
        $source->fill($data);
        if ($source->save()) {
            return redirect()->route('admin.source.index')
                ->with('success', "Источник новостей с #ID {$source->id} успешно изменен");
        }

        return back()->with('fail', "Не удалось изменить источник новостей с #ID {$source->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Source $source)
    {
        if ($source->delete()) {
            return redirect()->route('admin.source.index')
                ->with('success', "Источник новостей с #ID {$source->id} успешно удален");
        }

        return back()->with('fail', "Не удалось удалить источник новостей с #ID {$source->id}");
    }
}
