<ul>
    <li><a class="active " href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('about') }}">About</a></li>
    <li><a href="{{ route('notice') }}">Notices</a></li>
    <li><a href="{{ route('applypage') }}">Announcement</a></li>
    @guest
        @if (Route::has('login'))
            <li><a href="{{ route('login') }}">login</a></li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <a class="dropdown-item text-dark" href="{{ route('admin') }}">
                    {{ __('Dashboard') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
    <li><a href="{{ route('contact') }}">Contact Us</a></li>
</ul>
