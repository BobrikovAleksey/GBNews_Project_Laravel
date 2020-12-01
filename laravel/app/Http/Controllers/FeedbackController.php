<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Models\{Category, Feedback};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};

class FeedbackController extends Controller
{
    /**
     * Возвращает массив с общими данными представлений
     *
     * @return array
     */
    protected function getDataForViews()
    {
        return [
            'title' => 'Форма обратной связи',
            'categories' => Category::all(),
            'breadcrumbs' => [ 'name' => 'home-contact' ],
        ];
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('feedback', $this->getDataForViews());
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
            'name' => ['bail', 'required', 'max:128'],
            'email' => ['bail', 'required', 'max:256'],
            'subject' => ['bail', 'required', 'max:256'],
            'message' => ['bail', 'required', 'max:1000'],
        ]);

        $data = $request->only(['name', 'email', 'subject', 'message']);

        if (Feedback::create($data)) {
            return redirect()->route('feedback.index')->with('success', 'Сообщение успешно отправлено');
        }

        return back()->with('fail', 'Не удалось отправить сообщение, попробуйте еще раз, пожалуйста');
    }
}
