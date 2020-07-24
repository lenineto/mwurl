@extends('layouts.page')

@section('title', 'About This Project')

@section('icon', 'about.svg')

@section('content')

    <div class="flex-baseline title">
        <div>
            <img alt="mw-logo" src="/images/mw-logo-mobile.svg" width="200">
        </div>
        <div>
            <h2>This is a moore-wilson task assignment</h2>
        </div>
    </div>

    <div class="text">

        <h3>App requirements</h3>
        <p>To build a URL shortener application similar https://bitly.com/</p>

        <h3>Data models</h3>
        <p>Hold a URL target, shortcut URL, and an owner ID</p>

        <h3>User types</h3>
        <p>An authenticated user that logs in to manage their own short URL records.<br>
            There will be an anonymous user that can search, and view URL all records.</p>

        <h3>User stories</h3>
        <ul>
            <li>As an authenticated user I can add my own URL shortcut record</li>
            <li>As an authenticated user I can edit my own URL shortcut record</li>
            <li>As an authenticated user I can delete my own URL shortcut record</li>
            <li>As an authenticated user I can search my own URL shortcut records</li>
            <li>As an anonymous user I can look up a shortened URL record</li>
            <li>As an anonymous user I can use the shortened URL e.g. https://localhost/shorten/short-token</li>
        </ul>

        <h3>Tests</h3>

        <p>Validate URLs:</p>
        <ul>
            <li>Check exists</li>
            <li>Check unique for user</li>
            <li>Check short URL is generated on save</li>
            <li>Check exception thrown on not returning a short URL</li>
        </ul>

        <h3>Expectations</h3>

        <ul>
            <li>Use of migrations</li>
            <li>Use of models</li>
            <li>Use of factories</li>
            <li>Use of seeds</li>
            <li>Use of tests</li>
            <li>Use of controllers</li>
            <li>Adhering to coding standards</li>
            <li>Security concerns around form input</li>
            <li>Deployment process defined</li>
        </ul>
        <p>Use of Laracast video platform (MW subscription available) and Laravel docs recommended.</p>

        <h3>Nice to have</h3>
        <p>Custom Form Request objects used.</p>
        <p>Docblocks used throughout to denote use of methods, parameters, throws, and return types.</p>

        <h3>Github Clone URL</h3>
        <p>https://github.com/lenineto/mwurl.git</p>

        <h5>-= New branch v2.0 added =-</h5>

    </div>
    <div class="spacer"></div>
    <div class="spacer"></div>
@endsection
