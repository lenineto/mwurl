@extends('layouts.page')

@section('title', 'm-w URL password reset')

@section('icon', 'register.svg')

@section('content')
    <div class="container">
        <div class="row justify-content-center custom-form p-5">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="row mb-3 justify-content-start">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="col-12 col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                               placeholder="{{ __('E-Mail Address') }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center pb-2 mb-3">
                    <div class="col-12 col-md-6">
                        <input id="password" type="password"
                               class="text-input form-control @error('password') is-invalid @enderror" name="password"
                               required autocomplete="new-password" placeholder="{{ __('Password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <input id="password-confirm" type="password" class="text-input form-control"
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>

                <div class="row justify-content-start pb-2 mb-3">
                    <div class="col-12 col-md-6">
                        <button class="submitBnt btn btn-danger btn-block" type="submit">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
