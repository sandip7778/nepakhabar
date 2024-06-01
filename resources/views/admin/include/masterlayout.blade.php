<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Nepa-Khabar-Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets_news/img/logo/Logo-1.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

    <link rel="stylesheet" href="assets/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="assets/modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/modules/dropzonejs/dropzone.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div class="loader-line" id="pro_loader"></div>
    <div id="app">

        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars icons"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>

                    </div>
                </form>
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
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block icons">Hi, Guest</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <!-- <a href="#" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a> -->
                            <!-- features-profile.html -->
                            <div class="dropdown-divider"></div>
                            <a href="#" id="logout" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">

                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('dashboard') }}" class="p_white">Nepa-Khabar</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">NK</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="dropdown">
                            <a href="{{ route('dashboard') }}" class="nav-link"><i
                                    class="fas fa-fire"></i><span>Dashboard</span></a>

                        </li>
                        <li class="menu-header">Manage Post</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-images"></i> <span>Manage Categories</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                                <li><a class="nav-link" href="{{ route('categories.create') }}">Create Categories</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Manage Posts</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/create_post">Create Post</a></li>
                                <li><a class="nav-link" href="/posts">Manage News</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Starter</li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Manage Slider</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=sliders">Sliders</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Manage Advertisment</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=gallery">Gallery</a></li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Upcoming Events</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=events">Events</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Manage Team</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=team_members">Team Members</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="fas fa-columns"></i> <span>Manage Sites</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=team_members">Site Setting</a></li>
                            </ul>
                             <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=team_members">Deffult SEO </a></li>
                            </ul>
                             <ul class="dropdown-menu">
                                <li><a class="nav-link" href="dashboard.php?page=team_members">Tags Setting </a></li>
                            </ul>
                        </li>



                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="http://sfnepal.org" class="btn btn-danger btn-lg btn-block btn-icon-split"
                            target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-rocket"></i> Website
                        </a>

                    </div>
                </aside>
            </div>

            <!-- Main Content  -->
            @yield('content')



            <br>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2024-<?php echo date('Y'); ?> <div class="bullet"></div> Develope By <a
                        href="http://linkupnepal.com/" target="_blank" rel="noopener noreferrer">Linkupnepal</a>
                </div>
                <div class="footer-right">


                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>

    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <script src="assets/modules/codemirror/lib/codemirror.js"></script>
    <script src="assets/modules/codemirror/mode/javascript/javascript.js"></script>
    <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- JS Libraies -->
    <script src="assets/modules/dropzonejs/min/dropzone.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/components-multiple-upload.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/index-0.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="pages/jquery/main.js"></script>
</body>

</html>
