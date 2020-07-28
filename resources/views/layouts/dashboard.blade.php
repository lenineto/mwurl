<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.default_header')
<body>
    @include('layouts.partials.navbar')

    <!-- START DASHBOARD HEADER  -->
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
    <!-- END DASHBOARD HEADER -->

    <!-- START STATUS MESSAGE SECTION -->
    @if (session('status'))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 md-8 alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    <!-- END STATUS MESSAGE SECTION -->

    @if ( Auth::check() )
        <!-- DASHBOARD NAVBAR -->
        <section class="bg-light pb-3 pb-md-5">
            <div class="container homenav bg-light">
                <div class="row justify-content-center pt-2 mt-1 ">
                    <div class="col-12 md-10 text-center">
                        <h3>{{ __(('Welcome back, ')) }} {{ Auth::user()->name }}</h3>
                    </div>
                </div>
                <div class="row justify-content-center align-content-center mt-4">
                    <div class="links col-12 col-md-4 col-lg mt-2">
                        <button class="btn btn-dashboard" type="button" onclick="location.href='{{ route('url.create') }}'">
                            {{ __(('New Short URL')) }}
                        </button>
                    </div>
                    <div class="links col-12 col-md-4 col-lg mt-2">
                        <button class="btn btn-dashboard" type="button" onclick="location.href='{{ route('url.index') }}'">
                            {{ __(('List My URLs')) }}
                        </button>
                    </div>
                    <div class="links col-12 col-md-4 col-lg mt-2">
                        <button class="btn btn-dashboard" type="button" onclick="location.href='{{ route('url.search.private') }}'">
                            {{ __(('Search for URL')) }}
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- END DASHBOARD NAVBAR -->

    @endif

    @yield('content')

    @include('layouts.partials.default_footer')

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/menu.init.js"></script>
    <!--common script for all pages-->
    <script src="js/jquery.app.js"></script>
    <script src="{{ asset('js/showhide.js') }}" defer></script>
</body>
</html>
