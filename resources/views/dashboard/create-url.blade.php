@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if ( Auth::check() )
        <h3>Create a short URL</h3>

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
           <form method="post" action="{{ route('store-url') }}">
                @csrf
                <div class="flex-center">
                    <div><input class="text-input" type="text" name="long_url" placeholder="Type the original (long) URL including https://" size="40" required></div>
                </div>
               <div class="line-spacer"></div>
               <div class="flex-center showhide">
                   <div id="shorturl"><span>{{ env('APP_URL') . '/' }}</span><input class="text-input" type="text" name="short_url" placeholder="Type the desired short token" size="30" required></div>
               </div>
               <div class="line-spacer"></div>
               <div class="flex-center">
               <div class="hspace25"><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} onclick="showhide('shorturl')">
                   <label  class="label" for="remember">
                       {{ __('Random URL') }}
                   </label>
               </div>

                   <div class="search-button"><button type="submit">Create URL</button></div>
               </div>
            </form>

        </div>

    @endif

@endsection
