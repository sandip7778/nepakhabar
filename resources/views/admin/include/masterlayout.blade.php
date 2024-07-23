<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title','NepaKhabar-Dashboard')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_news/img/logo/Logo-1.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    {{-- <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

    {{-- <link rel="stylesheet" href="assets/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="assets/modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/modules/dropzonejs/dropzone.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>
    <div class="loader-line" id="pro_loader"></div>
    <div id="app">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
            @if(!Auth::user()->isGuest())

                <form class="form-inline mr-auto" method="GET" action="{{ route('dashboard') }}">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars icons"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" name="search" placeholder="Search Posts.." aria-label="Search" value="{{ request()->input('search') }}" data-width="250" required>
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>

                    </div>
                </form>
                @endif
                <ul class="navbar-nav navbar-right">
                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope icons"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>

                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell icons"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>

                        </div>
                    </li> -->
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="{{ Auth::user()->name }} image" src="{{ Auth::user()->path ? Storage::url(Auth::user()->path) : asset('assets/img/avatar/avatar-5.png') }}" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block icons" >Hi, {{ Auth::user()->name }} <i class="fas fa-caret-down"></i></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"><span class="text-xl">{{ Auth::user()->userType }}</span></div>
                            <!-- <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <!-- features-profile.html -->
                            <div class="dropdown-divider"></div>
                            <div>
                                <a href="{{ route('profile.edit') }}" class="dropdown-item  has-icon text-danger">
                                    <i class="fas fa-user"></i> <span class="fw-bolder fs-6">Profile</span>
                                </a>
                            </div>

                            <div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger cursor">
                                        <i class="fas fa-sign-out-alt"></i> <span class="ml-3 fw-bolder fs-6">Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
            @if(!Auth::user()->isGuest())
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('dashboard') }}" class="p_white">Nepa-Khabar</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('dashboard') }}">NK</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i
                                    class="fas fa-fire"></i><span>Dashboard</span></a>

                        </li>
                        <li class="menu-header">Home page block design</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link"><i
                                    class="fas fa-file"></i> <span>Block Design</span></a>

                        </li>
                        <li class="menu-header">Manage Post</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-images"></i> <span>Manage Categories</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-pen-square"></i> <span>Manage Posts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('posts.create') }}">Create Post</a></li>
                                <li><a class="nav-link" href="{{ route('posts.index') }}">Manage Post</a></li>
                                <li><a class="nav-link" href="{{ route('posts.trendingPosts') }}">Manage Trending Post</a></li>

                            </ul>
                        </li>
                        {{-- <li class="menu-header">Starter</li> --}}
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-columns"></i> <span>Manage Advertisment</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('advertisements.create') }}">Create Advertisement</a></li>
                                <li><a class="nav-link" href="{{ route('advertisements.createWithCategory') }}"> Create Category Ad</a></li>
                                <li><a class="nav-link" href="{{ route('advertisements.index') }}">Advertisement</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-comment"></i> <span>Manage Comments</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('comments') }}">Comments</a></li>
                            </ul>
                        </li>
                        @if (Auth::user()->isAdmin())
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-users"></i> <span>Manage Users</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('guests.index') }}">Users</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-users"></i> <span>Manage Team Members</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('users.create') }}">Create Member</a></li>
                                <li><a class="nav-link" href="{{ route('users.index') }}">Team Members</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-network-wired"></i> <span>Settings</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('site.show',1)}}">Site Setting</a></li>
                                <li><a class="nav-link" href="{{ route('tranding.show',1) }}">Trending Post Count</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-camera"></i> <span>Manage Videos</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="#">Youtube Videos</a></li>
                                {{-- Route {{route('videos.index')}} --}}
                            </ul>
                        </li>
                        @endif
                    </ul>
                </aside>
            </div>
            @endif

            <!-- Main Content  -->
            @yield('content')


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024-<?php echo date('Y'); ?> <div class="bullet"></div> Develope By <a
                        href="http://linkupnepal.com/" target="_blank" rel="noopener noreferrer">Linkup Nepal Pvt. Ltd</a>
                </div>
                <div class="footer-right">


                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/multiselect-dropdown.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets/modules/summernote/summernote-bs4.js') }}"></script>

    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script src="{{ asset('assets/modules/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <!-- JS Libraies -->
    {{-- <script src="{{ asset('assets/modules/dropzonejs/min/dropzone.min.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/js/page/components-multiple-upload.js') }}"></script> --}}

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('assets/js/page/index-0.js') }}"></script> --}}

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/main_.js') }}"></script>
    {{-- <script src="{{ asset('pages/jquery/main.js') }}"></script> --}}
    <script>
        // Initialize tooltips
        $(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
        });
        </script>

</body>

</html>
