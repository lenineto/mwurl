@extends('layouts.page')

@section('title', 'm-w URL logbook')

@section('icon', 'logbook.svg')

@section('content')
    <div class="text">
        <h3>15/07/2020</h3>
        <ul>
            <li>Deploying laravel app <span class="bug">failed</span>. Investigating.</li>
            <li>App deployed <span class="fix">successfully</span>. Found the problem to be composer cache.
                <code>composer clearcache</code> fixed the problem.</li>
            <li>Done configuring .env</li>
            <li>Installing phpunit via composer <span class="bug">failed</span>. Investigating.</li>
            <li>Phpunit installed successfully. As it turns out I was just mislead by my recent training (Jeff always
                install phpunit via composer but <code>laravel new &lt;app&gt;</code> already handles that.</li>
            <li><span class="bug">Problem running phpunit</span>. Even the simplest test won't work. phpunit is failing
                to find *any* classes, no
            matter what. Investigating.</li>
            <li>Still fighting with phpunit. I have checked .env, composer.json, phpunit.xml multiple times. Can't find
            anything wrong with any of them. This should be working.</li>
            <li>Finally <span class="issue">found the problem</span>! As it turns out, it's PHPStorm itself, nothing
                wrong with app. I've decided to test phpunit on the command line and it worked. Investigating the issue
                with PHPStorm now.</li>
            <li><span class="fix">Problem fixed - woohoo!</span> Found the problem to be an actual bug in PHPStorm, so I've implemented a workaround
                and sent a bug report to JetBrains. phpunit fully working from PHPStorm now.</li>
        </ul>

        <h3>16/07/2020</h3>
        <ul>
            <li>Laid out the structure of the web app, including navigation and a minimalistic theme (based on Laravel’s
                default styling).</li>
            <li>Created the first blade templates for the views.</li>
            <li>Learning blade as we go, created a few blade layouts to make it easier to create new blade templates.</li>
            <li>Going one step further and creating reusable partials for the layout: header and footer.</li>
            <li>Moving Laravel’s default styling to a layout partial as well.</li>
            <li>Defined all the initial web routes, so all the menu entries work.</li>
            <li>Created a small set of icons to use on the project</li>
            <li>Created a little logic on the footer and a bit of css to make the menu nicer. Now the page won’t show a
                link to itself and it will dim the menu entry out.</li>
            <li>After finishing the about page (which is quite long), I realised we need a better menu. Don’t like the
                idea of having to scroll all the way down to access the menu.</li>
        </ul>

@endsection

