@extends('layouts.auth')

@section('title', 'm-w URL password reset')

@section('icon', 'register.svg')

@section('content')
<div class="container">

    @if ( !session('status'))
        <div class="flex-center">
            <div role="alert">
                <h3><span class="fix">{{ session('status') }}</span></h3>
            </div>
            <div class="spacer"></div>
        </div>
    @endif

        <div class="flex-center">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="flex-center">
                    <input id="email" type="email" class="text-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="line-spacer"></div>
                <div class="flex-center search-button btn-large">
                    <button type="submit">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>


            </form>
        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                            </div>
                        </div>



</div>
@endsection