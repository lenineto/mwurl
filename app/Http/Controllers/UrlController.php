<?php

namespace App\Http\Controllers;

use App\Url;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Illuminate\View\View;
use Throwable;

class UrlController extends Controller
{
    /**
     * Display the list of URLs for authenticated users
     * @return View
     * @noinspection PhpUndefinedMethodInspection
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
     * @return RedirectResponse|void
     */
    public function store()
    {
         request()->validate([
           'original_url' => 'required|active_url',
        ]);

       try {
            Url::create(
                [
                    'token' => $this->makeToken(),
                    'user_id' => Auth::user()->id,
                    'external' => request()->original_url,
                    'enabled' => true
                ]
            );
        } catch ( Throwable $exception ) {
          abort( 409, "Short URL token must be unique");
       }
         return redirect()->route('url.index');
    }

    /**
     * Shows the URL edit form
     * @param Url $url
     * @return View
     * @noinspection PhpUndefinedMethodInspection
     */
    public function edit(Url $url)
    {
        return view('dashboard.url.edit')->withUrl($url);
    }

    /**
     * Update the URL and redirects to the URL list
     * @param Url $url
     * @return RedirectResponse
     */
    public function update(Url $url)
    {
        request()->validate([
            'original_url' => 'required|active_url'
        ]);

        $url->fill([
            'external'  => request()->original_url,
            'token' => $this->makeToken(),
            'enabled'   => request()->enabled ? true : false
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
        if ($this->isOwner($url)) {
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
        if ($this->isOwner($url)) {
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
        if ($this->isOwner($url)) {
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

    /**
     * Pass the sanitized token back or generate a random one
     * @return Stringable|string
     */
    protected function makeToken()
    {
        if (request()->token) {
            $token = Str::of(request()->token)
                ->replaceMatches('/(http|https):/', '')
                ->slug('');
        } else {
            $token = Str::slug(Str::random(9), '-');
        }
        return $token;
    }

    /**
     * Check the authenticated user owns the current URL
     * @param Url $url
     * @return bool
     */
    protected function isOwner(Url $url): bool
    {
        return Auth::user() == $url->owner;
    }
}
