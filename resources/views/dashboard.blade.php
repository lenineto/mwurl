@extends('layouts.auth')

@section('title', 'm-w URL dashboard')

@section('icon', 'dashboard.svg')

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if ( Auth::check() )
    <h2>Welcome back {{ Auth::user()->name }}</h2>
    @endif

@endsection
