@extends('layouts.auth')

@section('title', 'm-w URL registration')

@section('icon', 'register.svg')

@section('content')
<div class="container">
    <div class="flex-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex-center">
                <div class="hspace25">
                    <input id="name" type="text" class="text-input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div>
                    <input id="email" type="email" class="text-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="line-spacer"></div>
            <div class="flex-center">
                <div class="hspace25">
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
            <div class="flex-center">
                <div class="search-button btn-large"><button type="submit">{{ __('Register') }}</button></div>
            </div>
        </form>
    </div>
</div>
@endsection
