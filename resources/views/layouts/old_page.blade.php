@include('layouts.partials.old_default_header')
<body>
<div class="content">
    <div class="spacer"></div>
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

<div class="spacer"></div>
<div class="spacer"></div>
</body>
</html>
