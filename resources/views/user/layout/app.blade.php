<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('user/layout.app.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ route('user.home') }}">
                        {{ __('user/layout.app.logo') }}
                    </a>
                @else
                    @if(Auth::user()->role == 'admin')
                        <a class="navbar-brand" href="{{ route('admin.home') }}">
                            {{ __('user/layout.app.user') }}
                        </a>
                        <a class="navbar-brand" href="{{ route('user.home') }}">
                            {{ __('user/layout.app.home') }}
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ route('user.home') }}">
                            {{ __('user/layout.app.home') }}
                        </a>
                    @endif
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">{{ __('user/layout.app.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">{{ __('user/layout.app.register') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('user/js/jquery.min.js') }}"></script>
    @yield('script')
</body>
</html>
