@extends('layouts.page')

@section('title', 'm-w URL logbook')

@section('icon', 'logbook.svg')

@section('content')
    <div class="text">
        <h3>27/07/2020</h3>
        <ul>
            <li>Merged branch 'resource-routing' into master</li>
        </ul>

        <h3>25/07/2020</h3>
        <ul>
            <li>Updated the web routes to use resource routing</li>
            <li>Refactored the UrlController to reflect the new routes</li>
            <li>Moved/renamed the views to match the proper naming convention</li>
            <li>Removed unnecessary views</li>
            <li>Removed unnecessary routes and 'uses' from the web routes file</li>
            <li>Created a new PageController (without the page model) to serve static pages</li>
            <li>Created a new route for the static pages including a catch all</li>
            <li>Deleted all the unnecessary Controllers for each page</li>
        </ul>

        <h3>24/07/2020</h3>
        <ul>
            <li>branch v2.0 merged into master and deleted it</li>
            <li>Added a secondary route to the update function to avoid users trying to tamper with the URL,
               and a function that normalizes the URL by redirecting it to the edit url. If a user tries to go directly to
                {{ env('APP_URL') }}/dashboard/url/update/3 (the endpoint to update the URL, which expects a POST) it will
                redirect to {{ env('APP_URL') }}/dashboard/url/3 (the endpoint that renders the URL edit form)</li>
        </ul>
        <h3>23/07/2020</h3>
        <ul>
            <li><strong>Tasks are now handled in Jira, I will only include here anything that is not there.</strong></li>
        </ul>

        <h3>22/07/2020</h3>
        <ul>
            <li>Fixed the email problem affecting password resets (.env file updated to use mailhog on dev).</li>
            <li><strong>New branch &ldquo;v2.0&rdquo; added.</strong></li>
            <li>Laravel plugin installed on PHPStorm.</li>
            <li>Installed Barry's laravel-ide-helper via composer.</li>
            <li>Created the additional controllers to render the pages.</li>
            <li>Installed Barry's laravel-debugbar via composer.</li>
            <li>Refactored all the routes to have name, use a proper &ldquo;Controller@method&rdquo; or a invokable Controller.</li>
            <li>Modified the redirection route to pass the url_token 's/{token}'</li>
            <li>Updated the UrlController@redirect method to read url_token directly</li>
            <li>Added functionality to the UrlController@redirect method to include url parameters in the redirection</li>
            <li>Changing all the text on the templates to their @{{ __('text') }} version so it's ready for localization/</li>
        </ul>

        <h3>21/07/2020</h3>
        <ul>
            <li>Created the routes and views for authenticated users search.</li>
            <li>Created the routes and views for anonymous users search.</li>
            <li>Modified the URL model to include a scopeSearch function.</li>
            <li>Created a search() method on the URLController to load the search forms.</li>
            <li>Created the code on show() within the URLController to find the URLs and load the search results</li>
            <li>Implemented the search functionality for authenticated users, with editing capabilities on the result set.</li>
            <li>Implemented the public search functionality for anonymous users, only showing enabled URLs.</li>
            <li>Created the redirection Route that accepts /s/* and pass it to UrlController@redirect.</li>
            <li>Created the redirect() method on the URLController retrieves the proper URL and redirects to its original
                (long) version.</li>
            <li>Created a invalid-url view and redirect to it in case the short URL doesn't exist or is disabled.</li>
            <li>Modified the short url login to accept a custom user input and offer a random one as well.</li>
            <li>Created a little JS that show/hides and sets/unsets the required parameter on the field.</li>
        </ul>

        <h3>20/07/2020</h3>
        <ul>
            <li>Decided on a short URL formula to user our app's base URL (as set in .env APP_URL) with a 9 chars random,
                slug safe string.</li>
            <li>Created the user seeder with automated values from faker class.</li>
            <li>Created the url seeder that creates new random long and short urls and add to the most recently added user.</li>
            <li>Using a try/catch inside a while loop to make sure a new random user is always added, just in case the newly
                generated random user is already on the database.</li>
            <li>Implemented the URL listing feature (lists all URLs for the currently logged user).</li>
            <li>Created the enable/disable URL functionality including DB updates, routes and controller functions.</li>
            <li>Refactored the code to properly load the CSS from a .css file instead of injecting from a blade template.</li>
            <li>Implemented the logged-user functionality with CRUD.</li>
            <li>Updated header partials to use version number on css and js files to help burst cache.</li>
            <li>Created the additional UrlController functions to handle new/update.</li>
            <li>Implemented delete URL functionality.</li>
            <li>Created the new routes to handle URL creation/update/delete.</li>
        </ul>

        <h3>17/07/2020</h3>
        <ul>
            <li>Researched about Laravel's built-in user authentication and how to implement it.</li>
            <li>Installed laravel/ui via composer.</li>
            <li>Installed the basic views and routes for user auth via php artisan <code>php artisan ui vue --auth.</code></li>
            <li>Tested creating new user and logging in, <span class="fix">working.</span></li>
            <li>Restricted access on Dashboard to logged users, redirecting to login automatically. <span class="fix">Perfect.</span></li>
            <li>Changed all laravel auth/views to be consistent with app visual styles.</li>
            <li>Noticed <span class="bug">users were not being created</span> when using my own view, still working with laravel's default view. Laravel is returning no errors.</li>
            <li>Found out <span class="bug">PHPStorm is not properly debugging</span> with Laravel (working fine otherwise), so it's now tricky to trace what's causing this issue.</li>
            <li>Had to resort to using <code>dd ($data);</code> inside Auth\RegisterController.php and realised the email field was missing.</li>
            <li>Somehow during some copy & paste I ended up with the email field named "name" rather than "email". <span class="fix">Fixed!
                    Registration now works fine.</span></li>
            <li>Updated the views for auth/confirm, auth/email and auth/reset as well. A bit tricky but no sweat.</li>
            <li>Create new layout partials auth_header.blade.php and auth_footer.blade.php.</li>
            <li>Inserted csrf-token into head and also loading app.js from there.</li>
            <li>Created a little logic on auth_footer using <code>Auth::check()</code> to show a LOGOUT menu to logged users.</li>
            <li>Logout links only show when accessing protected pages.</li>
            <li>Retested and everything is working fine. Email functionality has not been tested. I will test it on the live server later.</li>
            <li>Commit new version to Github and update the server.</li>
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
            <li>Redone the footer to have a sticky menu at the bottom (pure css).</li>
            <li>Created the Github repo and pushed the code to it.</li>
            <li>Created the app on the live server and sync'ed from git.</li>
            <li>Created and set the .env file.</li>
            <li><code>Composer install</code> to initialise the laravel framework and install dependencies.</li>
            <li>Use <code>php artisan key:generate</code> to update .env.</li>
            <li>Tested the app, loading fine.</li>
            <li>Commit with all latest updates.</li>
        </ul>

        <h3>15/07/2020</h3>
        <ul>
            <li>Deploying laravel app <span class="bug">failed</span>. Investigating.</li>
            <li>App deployed <span class="fix">successfully</span>. Found the problem to be composer cache.
                <code>composer clearcache</code> fixed the problem.</li>
            <li>Done configuring .env.</li>
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



@endsection

