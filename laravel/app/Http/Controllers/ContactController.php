<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('contact', [
            'title' => 'Связаться с нами',
            'categories' => Category::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'subject', 'message']);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        return response()->json($data);
    }
}
