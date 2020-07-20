<?php


namespace App\Http\Controllers;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function addUrl()
    {
        return view('dashboard/add-url');
    }

    public function searchUrl() {
        return view('dashboard/search-url');
    }

    public function listUrls() {
        return view ('dashboard/list-urls');
    }
}
