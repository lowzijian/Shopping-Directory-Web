<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    @guest
                    @else
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    @endguest

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong>{{ config('app.name', 'Pavilion') }}</strong>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @auth
                            @if (\Request::is('admin*') || \Request::is('tenant*') || \Request::is('zone*') || \Request::is('category*')) 
                            &nbsp;
                            <li class = "nav-item">
                                <a href = "{{ url('/admin') }}" class = "nav-link">
                                    Main Page
                                </a>
                            </li>
                            <li class = "nav-item">
                                <a href = "{{ url('/tenant') }}" class = "nav-link">
                                    Tenant
                                </a>
                            </li>
                            <li class = "nav-item">
                                <a href = "{{ url('/zone') }}" class = "nav-link">
                                    Zone
                                </a>
                            </li>
                            <li class = "nav-item">
                                <a href = "{{ url('/category') }}" class = "nav-link">
                                    Category
                                </a>
                            </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <!--
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            -->
                        @else
                            @if (\Request::is('admin*') || \Request::is('tenant*') || \Request::is('zone*') || \Request::is('category*')) 
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <ul class="nav navbar-nav">
                                    <li class = "nav-item">
                                        <a href = "{{ url('/admin') }}" class = "nav-link">
                                            Config
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        Copyright &copy; Pavilion 2019
    </footer>
</body>
</html>
