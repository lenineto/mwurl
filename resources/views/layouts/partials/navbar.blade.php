<!-- TAGLINE HEADER START-->
<div class="topbar tagline-light">
    <div class="container">
        <div class="float-left">
            <div class="phone-topbar text-dark">
                <p class="mb-0">m-w URL shortener</p>
            </div>
        </div>
        <div class="float-right">
            <ul class="list-inline social pb-0 pt-2">
                <li class="list-inline-item pl-2"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                <li class="list-inline-item pl-2"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                <li class="list-inline-item pl-2"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Static navbar -->



<!-- Navigation Bar-->
<header id="topnav" class="defaultscroll topnav-light sticky darkheader fixed-top mt-0 pt-0">
    <div class="container">
        <div class="menu-extras">

            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu ">
                <li class="has-submenu">
                    <a href="/">Home</a>
                </li>

                <li class="has-submenu">
                    <a href="/url/search">Search</a>
                </li>

                <li class="has-submenu">
                    <a href="/dashboard">Dashboard</a>
                </li>

                <li class="has-submenu">
                    <a href="/logbook">Logbook</a>
                </li>

                <li class="has-submenu">
                    <a href="/todo">ToDo</a>
                </li>

                <li class="has-submenu">
                    <a href="/about">About</a>
                </li>

                <li class="has-submenu">
                    <a href="https://github.com/lenineto/mwurl" target="_blank">Github</a>
                </li>
                @if (Auth::check())
                    <li class="has-submenu mobile-block">
                        <a href="javascript: void(0);" onclick="document.getElementById('mw-logout').submit();">{{ __('Logout') }}</a>
                    </li>

                @else
                    <li class="has-submenu mobile-block">
                        <a href="/login">{{ __('Login') }}</a>
                    </li>

                    <li class="has-submenu mobile-block">
                        <a href="/register">{{ __('Signup') }}</a>
                    </li>
                @endif
            </ul>
            <ul class="navigation-menu menu-right">
                @if (Auth::check())
                    <li class="mobile-none"><a href="javascript: void(0);"
                                               onclick="document.getElementById('mw-logout').submit();">{{ __('Logout') }}</a>
                    </li>
                @else
                    <li class="mobile-none">
                        <a href="/login">{{ __('Login') }}</a>
                    </li>
                    <li class="mobile-none">
                        <a href="/register">{{ __('Signup') }}</a>
                    </li>
                @endif

            </ul>
            <!-- End navigation menu-->
        </div>
        <form id="mw-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</header>
<!-- End Navigation Bar-->
