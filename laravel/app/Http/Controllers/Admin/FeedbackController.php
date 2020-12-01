<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, Feedback};
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{RedirectResponse, Request};

class FeedbackController extends Controller
{
    protected int $feedbackOnPage;

    public function __construct()
    {
        $this->feedbackOnPage = config('app.feedback_on.page');
    }

    /**
     * Возвращает массив с общими данными представлений
     *
     * @return array
     */
    protected function getDataForViews()
    {
        return [
            'title' => 'Панель управления > Обратная связь',
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
        return view('admin.feedback.index', array_merge($this->getDataForViews(), [
            'feedbackList' => Feedback::paginate($this->feedbackOnPage),
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feedback $feedback
     * @return Application|Factory|View
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedback.edit', array_merge($this->getDataForViews(), [
            'feedback' => $feedback,
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'notes' => 'max:1024',
        ]);

        $feedback->fill(array_merge($request->only(['notes']), ['response' => true]));
        if ($feedback->save()) {
            return redirect()->route('admin.feedback.index')
                ->with('success',
                    "Обращение от {$feedback->name} ({$feedback->created_at->format('d.m.Y H:i')}) успешно закрыто");
        }

        return back()->with('fail',
            "Не удалось закрыть обращение от {$feedback->name}, {$feedback->created_at->format('d.m.Y H:i')}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Feedback $feedback
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Request $request, Feedback $feedback)
    {
        $request->validate([
            'notes' => 'max:1024',
        ]);

        $feedback->fill(array_merge($request->only(['notes']), ['response' => true]));
        if ($feedback->save() && $feedback->delete()) {
            return redirect()->route('admin.feedback.index')
                ->with('success',
                    "Обращение от {$feedback->name} ({$feedback->created_at->format('d.m.Y H:i')}) успешно удалено");
        }

        return back()
            ->with('fail', "Не удалось удалить обращение от {$feedback->name}, {$feedback->created_at->format('d.m.Y H:i')}");
    }
}
