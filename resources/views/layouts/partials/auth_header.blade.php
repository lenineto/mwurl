<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>m-w URL shortener | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/showhide.js?v=1.4') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="/css/main.css?v=1.4">

</head>
