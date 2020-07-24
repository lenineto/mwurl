<?php /** @noinspection PhpUndefinedMethodInspection */

/** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers;

use App\Url;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Route;

class UrlController extends Controller
{
    /**
     * Display the list of URLs
     *
     * @return View
     */
    public function index()
    {
        if (Auth::check()) {
            $urls = Url::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
            return view('dashboard.urls.list')->withUrls($urls);
        }
        /** If the user is not logged in kick back to homepage */
        return view('homepage');
    }


    /**
     * Show the form for creating a new URL
     *
     * @return View
     */
    public function create()
    {
        return view( 'dashboard.url.create');
    }

    /**
     * Store a newly created URL into the DB
     *
     * @param Request $request
     * @return RedirectResponse
     * @noinspection PhpUndefinedFieldInspection
     */
    public function store(Request $request)
    {
         $request->validate([
           'long_url' => 'required|active_url',
        ]);

         if ( $request->url_token ) {
             $token = Str::of($request->url_token)->replace('http:', '')->replace('https:', '')
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

         return redirect()->route('urls.list.private')->withUrl($url);
    }

    /**
     * Display the matching URLs
     *
     * @param Request $request
     * @return View
     * @noinspection PhpUndefinedFieldInspection
     */
    public function show(Request $request)
    {
        $request->validate([
            'search_url' => 'required|min:4',
        ]);

        $keyword = Str::slug($request->search_url, '');

        /**
         * Handle search for authenticated user
         */
        if (Auth::check() && request()->routeIs('urls.list.private')) {
            $urls = Url::where('user_id', Auth::user()->id)->search($keyword)->orderBy('updated_at', 'desc')->get();
            if ($urls) {
                return view('dashboard.urls.list')->withUrls($urls)->withToken($keyword);
            }
            return view('dashboard.url.search');
        }

        /**
         * Handle search for anonymous user
         */
        $urls = Url::where('enabled', true)->search($keyword)->orderBy('updated_at', 'desc')->get();

        if ($urls) {
            return view('urls.list')->withUrls($urls)->withToken($keyword);
        }
        return view('urls.search');

    }

    /**
     * Shows the URL edit form passing the Url object
     * @param Url $url
     * @return View|RedirectResponse
     */
    public function edit(Url $url)
    {
        /** Normalize the URL */
        if (Route::current()->getName() !== 'url.edit') {
            return redirect()->route('url.edit', $url->id);
        }
        return view('dashboard.url.edit')->withUrl($url);
    }

    /**
     * Update the URL and redirects to the URL list
     *
     * @param Request $request
     * @param Url $url
     * @return RedirectResponse|View
     * @noinspection PhpUndefinedFieldInspection
     * @noinspection PhpUndefinedMethodInspection
     */
    public function update(Request $request, Url $url)
    {
        /** Renders the edit URL form*/
        if ($request->method() !== 'POST') {
            return view('dashboard.url.edit')->withUrl($url);
        }

        /** Updates the URL with the the form data */
        $request->validate([
            'long_url' => 'required|active_url'
        ]);

        if ( $request->url_token ) {
            $token = Str::of($request->url_token)->replace('http:', '')->replace('https:', '')
                ->replace('/', '')->replace('\\', '')->slug('');
        } else {
            $token = Str::slug(Str::random(9), '-');
        }

        $enabled = $request->enabled ? true : false;

        $url->fill([
            'long_url'  => $request->long_url,
            'url_token' => $token,
            'enabled'   => $enabled
        ]);
        $url->save();

        return redirect()->route('urls.list.private');
    }

    /**
     * Delete the URL and redirect to the URL list
     *
     * @param Url $url
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return redirect()->route('urls.list.private');
    }

    /**
     * Retrieve URL by id and enable it
     *
     * @param Url $url
     * @return RedirectResponse
     */
    public function disable(Url $url)
    {
        $url->enabled = false;
        $url->save();
        return redirect()->route('urls.list.private');
    }

    /**
     * Retrieve URL by id and disable it
     *
     * @param Url $url
     * @return RedirectResponse
     */
    public function enable(Url $url)
    {
        $url->enabled = true;
        $url->save();
        return redirect()->route('urls.list.private');
    }

    /**
     * Return different search forms for authenticated and anonymous users
     *
     * @return View
     */
    public function search()
    {
        if (Auth::check() && request()->routeIs('url.search.private')) {
            return view ('dashboard.url.search');
        }
        return view ('urls.search');
    }

    /**
     * Redirect to the external URL or render the error page
     *
     * @param Request $request
     * @param Url $url
     * @return RedirectResponse
     */
    public function redirect(Request $request, Url $url)
    {
        $queryString = $request->server->get('QUERY_STRING') ? '?' . $request->server->get('QUERY_STRING') : '';
        return redirect()->to($url->long_url . $queryString);
    }
}
