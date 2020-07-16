@extends('layouts.page')

@section('title', 'm-w URL search')

@section('icon', 'search.svg')

@section('content')
<div class="flex-center">
    <form method="post" action="/search/url">
        @csrf
        <div class="flex-center">
            <div><input class="text-input" type="text" name="search" placeholder="Type any part of an URL here to search..." size="40" required></div>
            <div class="search-button"><button type="submit">Search</button></div>
        </div>
    </form>
</div>


@endsection
