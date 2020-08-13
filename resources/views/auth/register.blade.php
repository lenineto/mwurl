@extends('layouts.page')

@section('title', 'm-w URL new account')

@section('icon', 'register.svg')

@section('content')
    <div class="container">
        <div class="row justify-content-center custom-form p-5">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row justify-content-center pt-0 pb-3">
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="{{ __('Name') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="{{ __('E-Mail Address') }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="row justify-content-center pb-3">
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <input id="password" type="password" class="form-control
                               @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password" placeholder="{{ __('Password') }}">
                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
                <div class="row justify-content-end p-0">
                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                        <button class="submitBnt btn btn-custom btn-block" type="submit">{{ __('Register') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
