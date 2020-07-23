<?php /** @noinspection ALL */

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Str;
use Carbon\Carbon;
use Illuminate\View\View;
use phpDocumentor\Reflection\Location;

class UrlController extends Controller
{
    /**
     * Display the list of URLs
     *
     * @return View
     */
    public function index()
    {
        $urls = Url::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();
        return view('dashboard/list-urls')->withUrls($urls);
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
     * Store a newly created URL in the DB
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
         $valid = $request->validate([
           'long_url' => 'required|active_url',
        ]);

         if ( $request->url_token ) {
             $token = Str::of($request->short_url)->replace('http:', '')->replace('https:', '')
                 ->replace('/', '')->replace('\\', '')->slug('');

         } else {
             $token = Str::slug(Str::random(9), '-');
         }

         $url = new Url();
         $url->user_id = Auth::user()->id;
         $url->long_url = $request->long_url;
         $url->url_token = $token;
         $url->enabled = true;
         $url->save();

         return redirect()->route('list-urls');
    }

    /**
     * Display the specified resources.
     *
     * @param Request $request
     * @return Response
     */
    public function show(Request $request)
    {
        $valid = $request->validate([
            'search_url' => 'required|min:4',
        ]);

        $keyword = Str::slug($request->search_url, '');


        if (Auth::check() && request()->routeIs('user-urls')) {


            $urls = \App\Url::where('user_id', Auth::user()->id)->search($keyword)->orderBy('updated_at', 'desc')->get();

              return view('dashboard/list-search')->withUrls($urls)->withToken($keyword);

        } else {

            $urls = \App\Url::where('enabled', true)->search($keyword)->orderBy('updated_at', 'desc')->get();

            return view('list-search')->withUrls($urls)->withToken($keyword);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return RedirectResponse
     */
    public function edit()
    {
        if ($_REQUEST['url']) {
            $url = Url::find($_REQUEST['url']);
            if ($url)
                return view('dashboard/edit-url')->withUrl($url);
        }
        return redirect()->route('list-urls');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'long_url' => 'required|active_url'
        ]);

        if ( $request->url_token ) {
            $token = Str::of($request->url_token)->replace('http:', '')->replace('https:', '')
                ->replace('/', '')->replace('\\', '')->slug('');

        } else {
            $token = Str::slug(Str::random(9), '-');
        }

        $url = Url::find($request->id);
        if (!$url)
            return redirect()->route('list-urls');

        $url->enabled = false;
        $url->long_url = $request->long_url;
        $url->url_token = $token;
        $url->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        if ($request->enabled)
            $url->enabled = true;
        $url->save();

        return redirect()->route('list-urls');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $url = Url::find($request->id);
        if (! $url)
            return redirect()->route('list-urls');

        $url->delete();

        return redirect()->route('list-urls');
    }

    /**
     * Read the 'url' GET parameter, update the URL status to disabled, redirect to URL list
     *
     * @return bool|RedirectResponse
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
     * @return bool|RedirectResponse
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
     * @return RedirectResponse
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
