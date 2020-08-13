<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.default_header')
<body>
<!-- START HOME  -->
<section class="home-bg-color" id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center text-white">
                <h1 class="mt-3 pt-2 home-title">Let's short that long link</h1>
                <p class="home-subtitle mx-auto pt-2">Short as many URLs as you want. Free of charge.</p>
                <div class="mt-5">
                    <a href="{{ route('dashboard') }}" class="btn btn-custom">Login or SignUp</a>
                </div>
                <div class="">
                    <img src="/images/home.png" alt="" class="img-fluid center-block home-dashboard">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid home-content">
    @yield('content')
</div>

<!-- END HOME -->
<!-- HOME NAVBAR -->
<section>
    <div class="container homenav">
        <div class="row justify-content-center">
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('/')) href="/" @else  class="disabled_link" @endif>Home</a></div>
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('url/search'))  href="/url/search"  @else  class="disabled_link"  @endif>Search</a></div>
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('dashboard'))  href="/dashboard"  @else  class="disabled_link"  @endif>Dashboard</a></div>
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('logbook'))  href="/logbook"  @else  class="disabled_link"  @endif>Logbook</a></div>
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('todo'))  href="/todo"  @else  class="disabled_link"  @endif>ToDo</a></div>
            <div class="links col-12 col-md-3 col-lg"><a @if (! Request::is('about'))  href="/about" @else  class="disabled_link"  @endif>About</a></div>
            <div class="links col-12 col-md-3 col-lg"><a href="https://github.com/lenineto/mwurl" target="_blank">GitHub</a></div>
        </div>
    </div>
</section>
<!-- END HOME NAVBAR -->
<!-- js placed at the end of the document so the pages load faster -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script src="/js/jquery.easing.min.js"></script>
<script src="/js/scrollspy.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/menu.init.js"></script>
<!--common script for all pages-->
<script src="/js/jquery.app.js"></script>
</body>
</html>
