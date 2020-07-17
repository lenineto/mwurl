@section('footer')
    <div class="footer">
        <div class="links">
            <a @if (! Request::is('/'))  href="/"  @else  class="disabled_link"  @endif>Home</a>
            <a @if (! Request::is('search'))  href="/search"  @else  class="disabled_link"  @endif>Search</a>
            <a @if (! Request::is('dashboard'))  href="/dashboard"  @else  class="disabled_link"  @endif>Dashboard</a>
            <a @if (! Request::is('logbook'))  href="/logbook"  @else  class="disabled_link"  @endif>Logbook</a>
            <a @if (! Request::is('todo'))  href="/todo"  @else  class="disabled_link"  @endif>ToDo</a>
            <a @if (! Request::is('about'))  href="/about" @else  class="disabled_link"  @endif>About</a>
            @if ( Auth::check() )
                <a href="javascript: void(0);" onclick="document.getElementById('mw-logout').submit();">
                    {{ __('Logout') }}
                </a>
            @else
                <a href="/register">Register</a>
            @endif
            <a href="https://github.com/lenineto/mwurl" target="_blank">GitHub</a>
        </div>
    </div>
    <form id="mw-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="spacer"></div>
@show
