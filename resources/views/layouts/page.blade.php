<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.default_header')
<body>
@include('layouts.partials.navbar')

<!-- START PAGE HEADER  -->
<section class="home-bg-color" id="home">
    <div class="container">
        <div class="row justify-content-center mt-5 pt-5">
            <div class="col-10 text-white text-center">
                <h1 class="home-title">@yield('title')</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-n3 pt-0">
            <div class="col-4 text-center">
                <div class="page-icon">
                    <img src="/images/@yield('icon')" alt="@yield('title')" class="img-fluid center-block home-dashboard">
                </div>
            </div>
        </div>


    </div>
</section>
<!-- END PAGE HEADER -->

<div class="container-fluid">
    @yield('content')
</div>



@include('layouts.partials.default_footer')
</body>
</html>
