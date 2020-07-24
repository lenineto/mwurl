@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')
    @if ( Auth::check() )
        <!--suppress HtmlFormInputWithoutLabel -->
        <h3>Search Your URLs</h3>

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
           <form method="post" action="{{ route('urls.list.private') }}">
                @csrf
                <div class="flex-center">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div><input class="text-input" type="text" name="search_url"
                        placeholder="Type any part of an URL here to search.." size="60" required></div>

                </div>
                <div class="line-spacer"></div>
                <div class="flex-center">
                   <div class="search-button"><button type="submit">{{ __('Search URLs') }}</button></div>
               </div>
            </form>

        </div>
    @endif
@endsection
