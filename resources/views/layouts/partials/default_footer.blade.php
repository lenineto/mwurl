@section('footer')
    <div class="footer">
        <div class="links">
            <a @if (! Request::is('/'))  href="/"  @else  class="disabled_link"  @endif>Home</a>
            <a @if (! Request::is('search'))  href="/search"  @else  class="disabled_link"  @endif>Search</a>
            <a @if (! Request::is('dashboard'))  href="/dashboard"  @else  class="disabled_link"  @endif>Dashboard</a>
            <a @if (! Request::is('logbook'))  href="/logbook"  @else  class="disabled_link"  @endif>Logbook</a>
            <a @if (! Request::is('todo'))  href="/todo"  @else  class="disabled_link"  @endif>ToDo</a>
            <a @if (! Request::is('about'))  href="/about"  @else  class="disabled_link"  @endif>About</a>
            <a href="https://github.com/lenineto/mwurl">GitHub</a>
        </div>
    </div>
    <div class="spacer"></div>
@show
