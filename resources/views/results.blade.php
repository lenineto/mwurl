@extends('layouts.page')

@section('title', 'm-w URL search')

@section('icon', 'results.svg')

@section('content')
    <div class="text">
        <h3>Search Results</h3>
        <ul>
            <li>This will show results for URLs containing <span class="issue">{{ strip_tags(Request::get('search')) }}</span></li>
        </ul>
    </div>
@endsection

