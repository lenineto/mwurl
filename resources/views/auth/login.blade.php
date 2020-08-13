@extends('layouts.page')

@section('title', 'm-w URL login')

@section('icon', 'login.svg')

@section('content')
    <div class="container">
        <div class="row justify-content-center custom-form p-5">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row justify-content-center p-0">
                    <!--suppress HtmlFormInputWithoutLabel -->
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                               placeholder="{{ __('E-Mail Address') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 pb-md-0">
                        <input id="password" type="password" class="text-input form-control
                                @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password" placeholder="{{ __('Password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center p-0 align-items-center pt-4">
                    <div class="col-12 col-md-6 pb-2">
                        <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme"
                            {{ old('rememberme') ? 'checked' : '' }}>
                        <label  class="label" for="rememberme">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="col-12 col-md-6 pb-2 mb-3">
                        <input type="submit" class="submitBnt btn btn-custom btn-block" value="{{ __('Login') }}">
                    </div>
                </div>

                @if (Route::has('password.request'))
                    <div class="links row justify-content-center text-center pt-5">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                @endif
                <div class="links row justify-content-center pt-4 pb-0 text-center align-items-baseline">
                    <a href="{{ route('register') }}">Don't have an account? Create one</a>
                </div>
            </form>
        </div>
    </div>
@endsection
