<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{

    /**
     * Returns views for static pages or a 404
     * @param string $slug
     * @return View|void
     */
    public function show($slug = 'home')
    {
        $slug = str_replace('/', '.', $slug );

        $pages = [
            'home',
            'about',
            'todo',
            'logbook',
            'url.search'
        ];

        if (in_array($slug, $pages)) {
            return view($slug);
        } else {
            abort(404);
        }
    }

}
