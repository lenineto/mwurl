@extends('layouts.dashboard')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')

    @if ( Auth::check() )
        <div class="container">
        <!--suppress HtmlFormInputWithoutLabel -->
            @if ($errors->any())
                <div class="row justify-content-center alert-danger mb-0 mt-4">
                    <div class="col-12 text-center pt-4 pb-1">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row justify-content-center custom-form mb-5 mt-2">
                <form method="post" action="{{ route('url.store') }}">
                    @csrf
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 text-left">
                            <h3>Create a short URL</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <input class="form-control" type="text" name="long_url"
                                    placeholder="Type the original (long) URL including https://" size="40" required>
                        </div>
                    </div>
                    <div id="shorturl" class="row justify-content-center showhide mt-3 align-items-center">
                        <div class="col-12 col-md-4 text-right pr-0 mr-0">
                            <span>{{ env('APP_URL') . '/s/' }}</span>
                        </div>
                        <div class="col-12 col-md-8 pl-1 mr-0">
                            <input class="form-control" type="text"
                                     name="url_token" placeholder="Type the desired short token" size="26" required>
                        </div>
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-12 col-md-8">
                            <input type="checkbox" name="remember" id="remember" onclick="showhide('shorturl')">
                            <label class="label" for="remember">
                                {{ __('Random URL') }}
                            </label>
                        </div>
                    </div>
                        <div class="row justify-content-center mt-3">
                            <div class="col-12 col-md-6">
                                <button class="btn btn-custom btn-block" type="submit">{{ __('Create URL') }}</button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    @endif

@endsection
