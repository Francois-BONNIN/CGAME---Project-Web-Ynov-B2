<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="/css/style.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse links" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav cgameLogo mr-auto">
                        <li>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="/images/LogoVoid.svg" height="30px">
                            </a>
                        </li>
                        <li class="nav-item links">
                            <a class="nav-link" href="{{ route('games.index') }}">Jeux</a>
                        </li>

                        @can('manage-items')
                            <li class="nav-item links">
                                <a href="{{ route('games.create')}}" class="nav-link">
                                <i class="far fa-lg red-icon fa-plus-square"></i>
                                </a>
                            </li>

                            <li class="nav-item links">    
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Utilisateurs</a>
                            </li>
                            <li class="nav-item links">    
                                <a class="nav-link" href="{{ route('reviews.index') }}">Avis</a>
                            </li>
                        @endcan
                        @yield('item-nav')
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item links">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item links" >
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                                </li>
                            @endif
                        @else
                            <a href="{{ route('carts.show') }}" class="solde red-icon"><strong> {{ Cart::count() }} </strong><i class="fas fa-shopping-cart"></i></a>
                            <a class="solde"><strong> {{ Auth::user()->balance }} </strong><i class="fas fa-euro-sign"></i></a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} 
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" >
                                    
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">Profil</a>
                                    

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Se déconnecter') }}
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
            @if (session('success'))
                <div class="container alert alert-success">
                {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <script src="/js/index.js"></script>
</body>
@yield('welcome')
</html>
