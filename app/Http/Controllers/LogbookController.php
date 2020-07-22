<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class LogbookController extends Controller
{
    /**
     * Show the Logbook page.
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request)
    {
        return view('logbook');
    }
}
