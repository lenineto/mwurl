@extends('layouts.auth')

@section('title', 'm-w URL password reset')

@section('icon', 'register.svg')

@section('content')
    <div class="flex-center">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="flex-center">
                <input id="email" type="email" class="text-input form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="line-spacer"></div>
            <div class="flex-center">
                <div class="hspacer25">
                    <input id="password" type="password" class="text-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div>
                    <input id="password-confirm" type="password" class="text-input form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                </div>
            </div>
            <div class="line-spacer"></div>
            <div class="flex-center search-button btn-large">
                <button type="submit">
                    {{ __('Reset Password') }}
                </button>
            </div>



        </form>
    </div>

@endsection
