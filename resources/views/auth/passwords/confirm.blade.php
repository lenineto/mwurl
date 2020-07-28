@extends('layouts.page')

@section('title', 'm-w URL password confirmation')

@section('icon', 'register.svg')

@section('content')
    <div class="container">
        <div class="row justify-content-center custom-form p-3">
            <div class="col-12 col-md-10 text-center"><h3>{{ __('Please confirm your password before continuing.') }}</h3></div>
        </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center pt-3 mt-3">
                    <div class="col-12 col-md-6">
                        <button class="btn btn-custom btn-block" type="submit">
                            {{ __('Confirm Password') }}
                        </button>
                    </div>
                </div>
                @if (Route::has('password.request'))
                    <div class="line-spacer"></div>
                    <div class="links search-button">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
@endsection
