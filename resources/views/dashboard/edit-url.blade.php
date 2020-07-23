@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')

    @if ( Auth::check() )
        <!--suppress HtmlFormInputWithoutLabel -->
        <h3>Edit URL</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex-center">
           <form id="updateurl" method="post" action="{{ route('url.update') }}">
                @csrf
                <div class="flex-center">
                    <input id="_urltoken" type="hidden" value="{{ $url->url_token }}">
                    <input name="id" type="hidden" value="{{ $url->id }}">
                    <div><input class="text-input" type="text" name="long_url" size="40"
                        value="{{ $url->long_url }}" required></div>
                </div>
               <div class="line-spacer"></div>
               <div class="flex-center showhide">
                   <div id="urltoken" class="hspace25"><span>{{ env('APP_URL') . '/s/' }}</span>
                       <input class="text-input" type="text" name="url_token" value="{{ $url->url_token }}" required></div>
                    <div><input type="checkbox" name="enabled" id="enabled" {{ $url->enabled ? 'checked' : '' }}>
                        <label  class="label" for="enabled">
                            {{ __('Enabled') }}
                        </label>
                    </div>
               </div>
               <div class="line-spacer"></div>
               <div class="flex-center">
               <div class="hspace25"><input type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }} onclick="showhide('urltoken')">

                   <label  class="label" for="remember">
                       {{ __('Random URL') }}
                   </label>
               </div>

                   <div class="search-button"><button type="submit">Update URL</button></div>
               </div>
           </form>
        </div>
               <div class="spacer"></div>
               <div class="flex-center">
                   <form id="removeurl" method="post" action="{{ route('url.delete') }}">
                       @csrf
                       <input type="hidden" name="id" value="{{ $url->id }}">
                   <div class="del-button"><button type="submit">Delete URL</button></div>
                   </form>
               </div>


    @endif

@endsection
