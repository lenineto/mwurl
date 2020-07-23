<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;


class HomeController extends Controller
{
    /**
     * Show
     *
     * @return View
     */
    public function __invoke()
    {
        return view('home');
    }
}
