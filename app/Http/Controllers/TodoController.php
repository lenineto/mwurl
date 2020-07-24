<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;


class TodoController extends Controller
{
    /**
     * Show the Logbook page.
     *
     * @return View
     */
    public function __invoke()
    {
        return view('todo');
    }
}
