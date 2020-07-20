@include('layouts.partials.auth_header')

<body>
<div id="app" class="content">
    <div class="spacer"></div>
    <img src="/images/@yield('icon')" height="250">
</div>
<div class="spacer"></div>

<div class="title">
    <h1>@yield('title')</h1>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if ( Auth::check() )
    <div class="content"><h3>Welcome back {{ Auth::user()->name }}</h3></div>


    <div class="flex-center">
        <div class="search-button btn-small"><button type="button" onclick="location.href='{{ route('create-url') }}'">New Short URL</button></div>
        <div class="search-button btn-small"><button type="button" onclick="location.href='/dashboard/list-urls'">List My URLs</button></div>
        <div class="search-button btn-small"><button type="button" onclick="location.href='/dashboard/search-url'">Search for URL</button></div>
    </div>

@endif

<div class="content">
    @yield('content')
</div>


@include('layouts.partials.auth_footer')

<div class="spacer"></div>
<div class="spacer"></div>
</body>
</html>
