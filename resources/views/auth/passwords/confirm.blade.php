@extends('layouts.auth')

@section('title', 'm-w URL password confirmation')

@section('icon', 'register.svg')

@section('content')
    <div class="container">
        <div class="content">
            <h3>{{ __('Please confirm your password before continuing.') }}</h3>
            <form method="POST" action="{{ route('password.confirm') }}">
                <div class="flex-center">
                    <input id="password" type="password" class="text-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="line-spacer"></div>
                <div class="flex-center search-button btn-large">
                    <button type="submit">
                        {{ __('Confirm Password') }}
                    </button>
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
