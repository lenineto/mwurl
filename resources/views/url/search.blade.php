@extends('layouts.page')

@section('title', 'm-w URL search')

@section('icon', 'search.svg')

@section('content')
    <section id="search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center p-3 mt-4">
                    <h3 class="section-title pt-3">Search Active URLs</h3>
                    <div class="custom-form pb-5">
                        <form method="post" action="{{ route('url.list.public') }}">
                            <!--suppress HtmlFormInputWithoutLabel -->
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="search_url"
                                           placeholder="Type any part of an URL here to search.." size="60" required>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <input type="submit" class="submitBnt btn btn-custom" value="{{ __('Search URLs') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
