<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', __('Food Blogs') ) }}</title>
 
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="nav-link" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Food Blogs') }} --}}
                    <div style="width: 23px;height: 23px;">
                        <i class="bi bi-cup-hot-fill"></i>
                    </div>
                </a>

                <div style="padding-left: 10px">
                    @if (isset($childPageNav))
                        {{ $childPageNav }}
                    @endif
                </div>
 
                <button class="navbar-toggler" type="button"
                 data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                 aria-controls="navbarSupportedContent" aria-expanded="false" 
                 aria-label="{{ __('Toggle navigation') }}">
                 <div style="width: 20px;height: 20px;">
                    <i class="bi bi-list"></i>
                </div>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

 
  

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            {{-- <a class="nav-link" href="{{ auth()->check() ? route('posts.list') : route('login') }}"">
                                Explore posts
                            </a> --}}

                            {{-- @if (!Route::is('posts.explore'))
                            @endif --}}
                            <a class="nav-link" href="{{ route('posts.explore') }}"">
                                {{ __('Explore posts') }}
                            </a>
                        </li>

                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href="{{ route('posts.my-posts') }}"">
                                {{ __('My posts') }}
                            </a>
                            @endauth
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a> --}}

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

        {{-- <main class="py-3">
            @yield('content')
        </main> --}}

        <main class="py-3">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
