<?php /** @noinspection PhpUndefinedMethodInspection */

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class UrlController extends Controller
{
    /**
     * Display the list of URLs
     *
     * @return View|false
     */
    public function index()
    {
        if (Auth::check()) {
            $urls = Url::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('dashboard/list-urls')->withUrls($urls);
        }
        return false;
    }


    /**
     * Show the form for creating a new URL
     *
     * @return View
     */
    public function create()
    {
        return view( 'dashboard/create-url');
    }

    /**
     * Store a newly created URL into the DB
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
         $request->validate([
           'long_url' => 'required|active_url',
        ]);

         if ( $request->url_token ) {
             $token = Str::of($request->short_url)->replace('http:', '')->replace('https:', '')
                 ->replace('/', '')->replace('\\', '')->slug('');

         } else {
             $token = Str::slug(Str::random(9), '-');
         }

        $url = Url::firstOrCreate(
          ['url_token' => $token],
          [
              'user_id' => Auth::user()->id,
              'long_url' => $request->long_url,
              'enabled' => true
          ]
        );

         return redirect()->route('list-urls')->withUrl($url);
    }

    /**
     * Display the matching URLs
     *
     * @param Request $request
     * @return View
     */
    public function show(Request $request)
    {
        $request->validate([
            'search_url' => 'required|min:4',
        ]);

        $keyword = Str::slug($request->search_url, '');

        if (Auth::check() && request()->routeIs('user-urls')) {
            $urls = Url::where('user_id', Auth::user()->id)->search($keyword)->orderBy('updated_at', 'desc')->get();
            return view('dashboard/list-search')->withUrls($urls)->withToken($keyword);

        } else {
            $urls = Url::where('enabled', true)->search($keyword)->orderBy('updated_at', 'desc')->get();
            return view('list-search')->withUrls($urls)->withToken($keyword);
        }
    }

    /**
     * Look the URL up and show the form for editing it, if found
     *
     * @return RedirectResponse
     */
    public function edit()
    {
        if ($_REQUEST['url']) {
            $url = Url::find($_REQUEST['url']);

            if ($url) {
                return view('dashboard/edit-url')->withUrl($url);
            }
        }
        return redirect()->route('list-urls');
    }

    /**
     * Update the URL and redirects to the URL list
     *
     * @param Request $request
     * @return RedirectResponse
     * @noinspection PhpUndefinedFieldInspection
     * @noinspection PhpUndefinedMethodInspection
     */
    public function update(Request $request)
    {
        $request->validate([
            'long_url' => 'required|active_url'
        ]);

        if ( $request->url_token ) {
            $token = Str::of($request->url_token)->replace('http:', '')->replace('https:', '')
                ->replace('/', '')->replace('\\', '')->slug('');

        } else {
            $token = Str::slug(Str::random(9), '-');
        }

        $url = Url::find($request->id);

        if ($url) {
            $url->enabled = false;
            $url->long_url = $request->long_url;
            $url->url_token = $token;
            if ($request->enabled) {
                $url->enabled = true;
            }
            $url->save();
        }

        return redirect()->route('list-urls');
    }

    /**
     * Delete the URL and redirect to the URL list
     *
     * @param Request $request
     * @return RedirectResponse
     * @noinspection PhpUndefinedFieldInspection
     */
    public function destroy(Request $request)
    {
        $url = Url::find($request->id);
        if ($url) {
            $url->delete();
        }

        return redirect()->route('list-urls');
    }

    /**
     * Read the 'url' GET parameter, update the URL status to disabled, redirect to URL list
     *
     * @return false|RedirectResponse
     */
    public function disable()
    {
        if ($_REQUEST['url']) {
            $url = Url::find($_REQUEST['url']);
            $url->enabled = false;
            $url->save();
            return redirect()->route('list-urls');
        }
        return false;
    }

    /**
     * Read the 'url' GET parameter, update the URL status to disabled, redirect to URL list
     *
     * @return false|RedirectResponse
     */
    public function enable()
    {
        if ($_REQUEST['url']) {
            $url = Url::find($_REQUEST['url']);
            $url->enabled = true;
            $url->save();
            return redirect()->route('list-urls');
        }
        return false;
    }

    /**
     * Return different search forms for authenticated and anonymous users
     *
     * @return View
     */
    public function search()
    {
        if (Auth::check() && request()->routeIs('user-search')) {
            return view ('dashboard/search-url');

        } else {
            return view ('/search-url');
        }
    }

    /**
     * Redirect to the external URL or render the error page
     *
     * @param Request $request
     * @param String $token
     * @return RedirectResponse|View
     */
    public function redirect(Request $request, String $token)
    {
        $queryString = $request->server->get('QUERY_STRING') ? '?' . $request->server->get('QUERY_STRING') : '';

        $url = Url::where('url_token', $token)->where('enabled', true)->first();
        if ($url)  {
            return redirect()->to($url->long_url . $queryString);
        }

        return view ('invalid-url')->withToken($token);
    }
}
