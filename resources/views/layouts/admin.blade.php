<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css" />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    @yield('head')
</head>

<body>
    {{-- <div id="app" class="vh-100">

        <header style="height: 60px;" class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-2">
            <div class="row justify-content-between">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">BoolBnB</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
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
        </header>

        <div class="container-fluid" style="height: calc(100% - 60px); padding-top: 60px">
            <div class="row h-100 position-sticky">


                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse h-100 position-fixed" style="z-index: 999;">
                    <div class="pt-3">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-chart-line"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.apartments.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.apartments.index') }}">
                                    <i class="fa-solid fa-house"></i> Apartments
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white position-relative {{ Route::currentRouteName() == 'admin.messages.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.messages.index') }}">
                                    <i class="fa-solid fa-message"></i> Messages
                                    @php
                                        if ($messages) {
                                            $count = $messages->where('state_message', false)->count();
                                        }
                                    @endphp
                                    @if ($count)
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{$count}}
                                            <span class="visually-hidden">unread messages</span>
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
</body> --}}

    <body>
        <div id="app">
            <div class="container-fluid vh-100">
                <div class="row h-100">

                    <nav class="navbar">
                        <div class="logo_item">
                            <i class="bx bx-menu" id="sidebarOpen"></i>
                            <img src="images/logo.png" alt=""></i>BoolBnB
                        </div>
                        <div class="search_bar">

                        </div>
                        <div class="navbar_content">
                            <i class="bi bi-grid"></i>
                            <i class='bx bx-sun' id="darkLight"></i>
                            <i class='bx bx-bell'></i>
                            <img src="images/profile.jpg" alt="" class="profile" />
                        </div>
                    </nav>
                    <nav class="sidebar">
                        <div class="menu_content">
                            <ul class="menu_items">
                                <div class="menu_title menu_dahsboard"></div>
                                <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
                                <!-- start -->

                                <li class="nav-item">
                                    <a class="nav-link dash text-dark {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                                        href="{{ route('admin.dashboard') }}">
                                        <i class="fa-regular fa-user" style="color: #0f0f10;"></i> Dashboard
                                    </a>
                                </li>
                                <!-- end -->
                                <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
                                <!-- start -->
                                <!-- end -->
                                <div class="menu_title menu_editor"></div>
                                <!-- duplicate these li tag if you want to add or remove navlink only -->
                                <!-- Start -->
                                <!-- End -->
                                <li class="item">
                                    <a class="nav_link {{ Route::currentRouteName() == 'admin.apartments.index' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.apartments.index') }}">
                                        <span class="navlink_icon">
                                            <i class="bx bx-loader-circle"></i>
                                        </span>
                                        <span class="navlink">Your Houses</span>
                                    </a>
                                </li>
                                <div class="menu_title menu_message"></div>
                                <!-- duplicate these li tag if you want to add or remove navlink only -->
                                <!-- Start -->
                                <li class="item">
                                    <a class="nav-link position-relative {{ Route::currentRouteName() == 'admin.messages.index' ? 'bg-secondary' : '' }}"
                                        href="{{ route('admin.messages.index') }}">
                                        <span class="navlink_icon">
                                            <i class="fa-solid fa-message"></i>
                                        </span>
                                        <span class="navlink">Message</span>
                                        @php
                                            if ($messages) {
                                                $count = $messages->where('state_message', false)->count();
                                            }
                                        @endphp
                                        @if ($count)
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                {{ $count }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        @endif
                                    </a>
                                </li>

                            </ul>
                            <!-- Sidebar Open / Close -->
                            <div class="bottom_content">
                                <div class="bottom expand_sidebar">
                                    <span> Expand</span>
                                    <i class='bx bx-log-in'></i>
                                </div>
                                <div class="bottom collapse_sidebar">
                                    <span> Collapse</span>
                                    <i class='bx bx-log-out'></i>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        @yield('content')
                    </main>
                </div>
            </div>

        </div>
        <script src="script.js"></script>
    </body>

</html>


<script>
    const body = document.querySelector("body");
    const darkLight = document.querySelector("#darkLight");
    const sidebar = document.querySelector(".sidebar");
    const submenuItems = document.querySelectorAll(".submenu_item");
    const sidebarOpen = document.querySelector("#sidebarOpen");
    const sidebarClose = document.querySelector(".collapse_sidebar");
    const sidebarExpand = document.querySelector(".expand_sidebar");
    sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

    sidebarClose.addEventListener("click", () => {
        sidebar.classList.add("close", "hoverable");
    });
    sidebarExpand.addEventListener("click", () => {
        sidebar.classList.remove("close", "hoverable");
    });

    sidebar.addEventListener("mouseenter", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.remove("close");
        }
    });
    sidebar.addEventListener("mouseleave", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.add("close");
        }
    });

    darkLight.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            document.setI
            darkLight.classList.replace("bx-sun", "bx-moon");
        } else {
            darkLight.classList.replace("bx-moon", "bx-sun");
        }
    });

    submenuItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            item.classList.toggle("show_submenu");
            submenuItems.forEach((item2, index2) => {
                if (index !== index2) {
                    item2.classList.remove("show_submenu");
                }
            });
        });
    });

    if (window.innerWidth < 768) {
        sidebar.classList.add("close");
    } else {
        sidebar.classList.remove("close");
    }
</script>





<style lang="scss" scoped>
    /* Import Google font - Poppins */
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    :root {
        --white-color: #fff;
        --blue-color: #4070f4;
        --grey-color: #707070;
        --grey-color-light: #aaa;
    }

    body {
        background-color: #ffffff;
        transition: all 0.5s ease;
    }

    body.dark {
        background-color: #333;
    }

    body.dark {
        --white-color: #333;
        --blue-color: #fff;
        --grey-color: #f2f2f2;
        --grey-color-light: #aaa;
    }

    /* navbar */
    .navbar {
        position: fixed;
        top: 0px;
        width: 100%;
        left: 0;
        background-color: var(--white-color);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 30px;
        z-index: 999;
        box-shadow: 0 0 2px var(--grey-color-light);
    }

    .logo_item {
        display: flex;
        align-items: center;
        column-gap: 10px;
        font-size: 22px;
        font-weight: 500;
        color: var(--blue-color);
    }

    .navbar img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
    }

    .search_bar {
        height: 47px;
        max-width: 430px;
        width: 100%;
    }

    .search_bar input {
        height: 100%;
        width: 100%;
        border-radius: 25px;
        font-size: 18px;
        outline: none;
        background-color: var(--white-color);
        color: var(--grey-color);
        border: 1px solid var(--grey-color-light);
        padding: 0 20px;
    }

    .navbar_content {
        display: flex;
        align-items: center;
        column-gap: 25px;
    }

    .navbar_content i {
        cursor: pointer;
        font-size: 20px;
        color: var(--grey-color);
    }

    /* sidebar */
    .sidebar {
        background-color: var(--white-color);
        width: 260px;
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        padding: 80px 20px;
        z-index: 100;
        overflow-y: scroll;
        box-shadow: 0 0 1px var(--grey-color-light);
        transition: all 0.5s ease;
    }

    .menu_message::before {
        content: "Messagges";
    }

    .sidebar.close {
        padding: 60px 0;
        width: 80px;
    }

    .sidebar::-webkit-scrollbar {
        display: none;
    }

    .menu_content {
        position: relative;
    }

    .menu_title {
        margin: 15px 0;
        padding: 0 20px;
        font-size: 18px;
    }

    .sidebar.close .menu_title {
        padding: 6px 30px;
    }

    .menu_title::before {
        color: var(--grey-color);
        white-space: nowrap;
    }

    .menu_dahsboard::before {
        content: "Dashboard";
    }

    .menu_editor::before {
        content: "Editor";
    }

    .menu_setting::before {
        content: "Setting";
    }

    .menu_payments::before {
        content: "Payments";
    }

    .sidebar.close .menu_title::before {
        content: "";
        position: absolute;
        height: 2px;
        width: 18px;
        border-radius: 12px;
        background: var(--grey-color-light);
    }

    .menu_items {
        padding: 0;
        list-style: none;
    }

    .navlink_icon {
        position: relative;
        font-size: 22px;
        min-width: 50px;
        line-height: 40px;
        display: inline-block;
        text-align: center;
        border-radius: 6px;
    }

    .navlink_icon::before {
        content: "";
        position: absolute;
        height: 100%;
        width: calc(100% + 100px);
        left: -20px;
    }



    .sidebar .nav_link {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 4px 15px;
        border-radius: 8px;
        text-decoration: none;
        color: var(--grey-color);
        white-space: nowrap;
    }

    .sidebar.close .navlink {
        display: none;
    }





    .submenu_item {
        cursor: pointer;
    }

    .submenu {
        display: none;
    }

    .submenu_item .arrow-left {
        position: absolute;
        right: 10px;
        display: inline-block;
        margin-right: auto;
    }

    .sidebar.close .submenu {
        display: none;
    }

    .show_submenu~.submenu {
        display: block;
    }

    .show_submenu .arrow-left {
        transform: rotate(90deg);
    }

    .submenu .sublink {
        padding: 15px 15px 15px 52px;
    }

    .bottom_content {
        position: fixed;
        bottom: 60px;
        left: 0;
        width: 260px;
        cursor: pointer;
        transition: all 0.5s ease;
    }

    .bottom {
        position: absolute;
        display: flex;
        align-items: center;
        left: 0;
        justify-content: space-around;
        padding: 18px 0;
        text-align: center;
        width: 100%;
        color: var(--grey-color);
        border-top: 1px solid var(--grey-color-light);
        background-color: var(--white-color);
    }

    .bottom i {
        font-size: 20px;
    }

    .bottom span {
        font-size: 18px;
    }

    .sidebar.close .bottom_content {
        width: 50px;
        left: 15px;
    }

    .sidebar.close .bottom span {
        display: none;
    }

    .sidebar.hoverable .collapse_sidebar {
        display: none;
    }

    #sidebarOpen {
        display: none;
    }

    @media screen and (max-width: 768px) {
        #sidebarOpen {
            font-size: 25px;
            display: block;
            margin-right: 10px;
            cursor: pointer;
            color: var(--grey-color);
        }

        .sidebar.close {
            left: -100%;
        }

        .search_bar {
            display: none;
        }

        .sidebar.close .bottom_content {
            left: -100%;
        }
    }

    .dash {
        margin-left: 20px
    }
</style>
