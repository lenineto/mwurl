<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Show
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        return view('home');
    }
}
