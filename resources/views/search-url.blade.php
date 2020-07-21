@extends('layouts.page')

@section('title', 'm-w URL search')

@section('icon', 'search.svg')

@section('content')
    <h3>Search Active URLs</h3>

    <div class="flex-center">
        <form method="post" action="{{ route('public-urls') }}">
            @csrf
            <div class="flex-center">
                <div><input class="text-input" type="text" name="search_url" placeholder="Type any part of an URL here to search.." size="60" required></div>
            </div>
            <div class="line-spacer"></div>
            <div class="flex-center">
                <div class="search-button"><button type="submit">{{ __('Search URLs') }}</button></div>
            </div>
        </form>

    </div>

@endsection
