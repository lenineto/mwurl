<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;

class AboutController extends Controller
{
    /**
     * Show the About page
     *
     * @return View
     */
    public function __invoke()
    {
        return view('about');
    }
}
