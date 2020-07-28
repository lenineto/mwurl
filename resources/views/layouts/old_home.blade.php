@include('layouts.partials.old_default_header')

<body>

<div class="spacer"></div>

<div class="content">
    <img src="/images/@yield('icon')" height="250">
</div>
<div class="spacer"></div>

<div class="title">
    <h1>@yield('title')</h1>
</div>

<div class="spacer"></div>

<div class="content">
    @yield('content')
</div>

@include('layouts.partials.old_default_footer')


</body>
</html>
