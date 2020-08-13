<?php

namespace App\Http\Controllers;

use App\Url;
use App\Http\Requests\UrlRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UrlController extends Controller
{
    /**
     * Display the list of URLs for authenticated users
     * @return View
     * @noinspection PhpUndefinedMethodInspection
     * @noinspection PhpUndefinedFieldInspection
     */
    public function index()
    {
        return view('dashboard.url.list')->withUrls(Auth::user()->urls);
    }

    /**
     * Show the form for creating a new URL
     * @return View
     */
    public function create()
    {
        return view( 'dashboard.url.create');
    }

    /**
     * Store a newly created URL
     * @param UrlRequest $urlRequest
     * @return RedirectResponse|void
     */
    public function store(UrlRequest $urlRequest)
    {
        Url::create(
            [
                'token' => $urlRequest->urltoken,
                'user_id' => Auth::user()->id,
                'external' => $urlRequest->original_url,
                'enabled' => $urlRequest->enabled
            ]
        );
        return redirect()->route('url.index');
    }

    /**
     * Shows the URL edit form
     * @param Url $url
     * @return View|void
     * @noinspection PhpUndefinedMethodInspection
     */
    public function edit(Url $url)
    {
        if ($url->isOwner()) {
            return view('dashboard.url.edit')->withUrl($url);
        }
        abort(401, 'Unauthorized request');
    }

    /**
     * Update the URL and redirects to the URL list
     * @param Url $url
     * @param UrlRequest $urlRequest
     * @return RedirectResponse
     */
    public function update(Url $url, UrlRequest $urlRequest)
    {
        $url->fill([
            'external'  => $urlRequest->original_url,
            'token' => $urlRequest->urltoken,
            'enabled' => $urlRequest->enabled
        ]);
        $url->save();

        return redirect()->route('url.index');
    }

    /**
     * Delete the URL and redirect to the URL list
     * @param Url $url
     * @return RedirectResponse|void
     * @throws Exception
     */
    public function destroy(Url $url)
    {
        if ($url->isOwner()) {
            $url->delete();
            return redirect()->route('url.index');
        }
        abort(401, "Unauthorized request. You can only delete your own URLs.");
    }

    /**
     * Return different search forms for authenticated and anonymous users
     * @return View
     */
    public function search()
    {
        return view ('dashboard.url.search');
    }


    /**
     * @return mixed
     * @noinspection PhpUndefinedMethodInspection
     */
    public function listPrivate()
    {
        $keyword = Str::slug(request()->search_url, '');
        $urls = Url::where('user_id', Auth::user()->id)->search($keyword)->orderBy('updated_at', 'desc')->get();
        return view('dashboard.url.list')->withUrls($urls)->withToken($keyword);
    }

    /**
     * @return mixed
     * @noinspection PhpUndefinedMethodInspection
     */
    public function listPublic()
    {
        $keyword = Str::slug(request()->search_url, '');
        $urls = Url::where('enabled', true)->search($keyword)->orderBy('updated_at', 'desc')->get();
        return view('url.list')->withUrls($urls)->withToken($keyword);
    }


    /**
     * Disable the URL
     * @param Url $url
     * @return RedirectResponse|void
     */
    public function disable(Url $url)
    {
        if ($url->isOwner()) {
            $url->disable();
            return redirect()->route('url.index');
        }
        abort(401, "Unauthorized request. You can only disable your own URLs.");
    }

    /**
     * Enable the URL
     * @param Url $url
     * @return RedirectResponse|void
     */
    public function enable(Url $url)
    {
        if ($url->isOwner()) {
            $url->enable();
            return redirect()->route('url.index');
        }
        abort(401, "Unauthorized request. You can only enable your own URLs.");
    }


    /**
     * Redirect to the external URL
     * @param Url $url
     * @return RedirectResponse
     */
    public function redirect(Url $url)
    {
        $queryString = request()->server->get('QUERY_STRING')
            ? '?' . request()->server->get('QUERY_STRING') : '';

        return redirect()->to($url->external . $queryString);
    }

}
