@extends('layouts.page')

@section('title', 'm-w URL password reset')

@section('icon', 'register.svg')

@section('content')
<div class="container">

@if ( session('status'))
    <div class="row">
        <div class="col-12" role="alert">
            <h3><span class="fix">{{ session('status') }}</span></h3>
            <h4>{{ _('Please check your inbox.') }}</h4>
        </div>
    </div>
@else

    <div class="custom-form p-5">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row justify-content-center pb-2 mb-3">
                <div class="col-md-6 text-center">
                    <input id="email" type="email" class="text-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <button class="btn btn-block btn-custom" type="submit">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endif

</div>
@endsection
