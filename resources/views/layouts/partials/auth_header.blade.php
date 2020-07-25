<!DOCTYPE html>
<!--suppress HtmlUnknownTarget -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>m-w URL shortener | @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/showhide.js?v=1.5') }}" defer></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="alternate_icon" type="image/png" href="favicon.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#636b6f">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="stylesheet" href="/css/main.css?v=1.4">
</head>
