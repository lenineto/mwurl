@extends('layouts.old_home')

@section('title', 'm-w URL bad URL')

@section('icon', 'home.svg')

@section('content')
    <h3> Sorry, URL &ldquo;<u>{{ env('APP_URL') . '/s/' . $token }}</u>&rdquo; was not found.</h3>
@endsection
