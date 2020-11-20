<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\{Category, News};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Support\Str;
use Illuminate\Http\{RedirectResponse, Request, Response};

class NewsController extends Controller
{
    protected function getDataForViews()
    {
        return [
            'title' => 'Панель управления',
            'categories' => Category::all(),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        ]);

        $data = $request->only(['title', 'cover', 'author', 'source', 'date', 'body']);
        $data['slug'] = Str::slug($data['title']);

        if (!strtotime($data['date'])) {
            $data['date'] = Carbon::now();
        }



    }

    /**
     * Display the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        //
    }
}
