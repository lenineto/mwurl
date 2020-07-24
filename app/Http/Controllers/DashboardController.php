<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Create a new dashboard instance with authentication.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Show the dashboard page
     *
     * @return View
     */
    public function index()
    {
        return view('dashboard');
    }

}
