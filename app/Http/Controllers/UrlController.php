<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use phpDocumentor\Reflection\Location;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = \App\Url::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->get();

        return view('dashboard/list-urls')->withUrls($urls);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'dashboard/create-url');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $valid = $request->validate([
           'long_url' => 'required|active_url'
        ]);

         if ( $request->short_url ) {
             $token = Str::of($request->short_url)->replace('http:', '')->replace('https:', '')
                 ->replace('/', '')->replace('\\', '')->slug('');

         } else {
             $token = Str::slug(Str::random(9), '-');
         }

         $url = new Url();
         $url->user_id = Auth::user()->id;
         $url->long_url = $request->long_url;
         $url->url_token = $token;
         $url->created_at = Carbon::now()->format('Y-m-d H:i:s');
         $url->updated_at = Carbon::now()->format('Y-m-d H:i:s');
         $url->save();

         return redirect()->route('list-urls');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'long_url' => 'required|active_url'
        ]);

        if ( $request->url_token ) {
            $token = Str::of($request->short_url)->replace('http:', '')->replace('https:', '')
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function disable(){
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
     * @return bool|\Illuminate\Http\RedirectResponse
     */
    public function enable(){
        if ($_REQUEST['url']) {
            $url = Url::find($_REQUEST['url']);
            $url->enabled = true;
            $url->save();
            return redirect()->route('list-urls');
        }
        return false;
    }
}
