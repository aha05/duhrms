<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('js/bootstraps.js') }}"></script>
    <script src="{{ asset('toaster/jquery-1.91.js') }}"></script>
    <script src="{{ asset('toaster/jquery-migrate.js') }}"></script>
    <link href="{{ asset('toaster/toaster.css') }}" rel="stylesheet" />
    <script src="{{ asset('toaster/toaster.js') }}"></script>




</head>

<body>
    <script>
        jQuery(window).load(function() {
            // will first fade out the loading animation
            jQuery("#status").fadeOut();
            // will fade out the whole DIV that covers the website.
            jQuery("#preloader").delay(100).fadeOut("slow");
        })
    </script>
    <div id="app">
        {{-- <div id="preloader">
            <div class="spinner spinner--steps icon-spinner"></div>
        </div> --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ _('DUHRMS') }} {{-- optinaly you can use this one config('app.name', 'Laravel') --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li><a href="{{ route('home') }}" class="nav-link px-2 text-secondary active">Home</a></li>
                        <li><a href="{{ route('applypage') }}" class="nav-link px-2 text-warning">Apply Job</a></li>

                        @if (Auth::check())
                            @if (auth()->user()->userHasRole('Admin'))
                                <li><a href="{{ route('about') }}" class="nav-link px-2 text-dark">About</a></li>
                            @endif
                        @endif
                    </ul>
                    <!-- center Side Of Navbar -->
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <div class="input-group w-100 me-5">
                                <input type="search" class="form-control rounded" placeholder="Search"
                                    aria-label="Search" aria-describedby="search-addon" />
                                <button type="button" class="btn btn-primary">search</button>
                            </div>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
