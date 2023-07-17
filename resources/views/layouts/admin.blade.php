<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/img/Logo.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @yield('head')
</head>

<body>
    <div id="app" class="vh-100">
        <header style="height: 60px;" class="fixed-top shadow-lg ms_nav">
            <nav class="navbar navbar-expand-lg p-0 m-0">
                <div class="container-fluid text-center justify-content-between">
                    <a href="http://localhost:5173/">
                        <img class="" src="{{ asset('img/bnbheader.png') }}" alt="">
                    </a>
                    <button class="navbar-toggler d-md-none border-0 collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-nav">
                        <div class="nav-item text-nowrap ms-2">
                            <a class="nav-link mx-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid" style="height: calc(100% - 60px); padding-top: 60px">
            <div class="row h-100 position-sticky">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar h-100 collapse position-fixed ms_nav"
                    style="z-index: 999;">
                    <div class="pt-3">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'text-black rounded' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-chart-line"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'admin.apartments') ? 'text-black rounded' : '' }}"
                                    href="{{ route('admin.apartments.index') }}">
                                    <i class="fa-solid fa-house"></i> Apartments
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'admin.sponsors') || Str::startsWith(Route::currentRouteName(), 'admin.payment') ? 'text-black rounded' : '' }}"
                                    href="{{ route('admin.sponsors.index') }}">
                                    <i class="fa-solid fa-hand-holding-dollar"></i> Sponsors
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link position-relative {{ Str::startsWith(Route::currentRouteName(), 'admin.messages') ? 'text-black rounded' : '' }}"
                                    href="{{ route('admin.messages.index') }}">
                                    <i class="fa-solid fa-message"></i> Messages
                                    @php
                                        if ($messages) {
                                            $count = $messages->where('state_message', false)->count();
                                        }
                                    @endphp
                                    @if ($count)
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ $count }}
                                            <span class="visually-hidden">Unread messages</span>
                                        </span>
                                    @endif
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
        @include('partials.modal_delete')
    </div>
    @yield('scripts')
</body>

</html>

<style lang="scss" scoped>
    :root {
        --primary-color: #24ADE3;
    }
    .nav-link {
        color: white;
    }
    .nav-link:hover {
        color: black;
    }
    .ms_nav {
        background-color: var(--primary-color)
    }

    .navbar-toggler:focus {
        box-shadow: none
    }
</style>
