@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')
    @if ( Auth::check() )
        <!--suppress HtmlFormInputWithoutLabel -->
        <div class="container pb-2">
            <div class="row justify-content-center mt-5">
                <h3>Search Your URLs</h3>
            </div>

            @if ($errors->any())
                <div class="row justify-content-center alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('url.list.private') }}">
                @csrf
                <div class="row justify-content-center custom-form">
                    <div class="col-12 col-md-6">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input class="form-control" type="text" name="search_url"
                               placeholder="Type any part of an URL here to search.." size="60" required>
                    </div>
                </div>
                <div class="row justify-content-center custom-form mt-3 mb-5">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-block btn-custom" type="submit">{{ __('Search URLs') }}</button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
