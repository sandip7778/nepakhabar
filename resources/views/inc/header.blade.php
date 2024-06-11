<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nepa Khabar | </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_news/img/logo/Logo-1.png')}}">

    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets_news/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_news/css/custom.css') }}">


</head>

<body>

    <div class="modal fade" id="addads" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
                </div>
                <form method="post" id="add_category" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col-md-12 mb-3">
                                <label class="f_text" for="category_name">Email</label>
                                <input type="email" class="form-control" name="name" id=""
                                    placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="f_text" for="category_name">Password</label>
                                <input type="password" class="form-control" name="name" id="category-name"
                                    placeholder="********" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets_news/img/logo/Logo-4.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <!-- <div class="header-top black-bg d-none d-md-block">
                   <div class="container">
                       <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li><img src="assets_news/img/icon/header_icon1.png" alt="">34ºc, Sunny </li>
                                        <li><img src="assets_news/img/icon/header_icon1.png" alt="">Tuesday, 18th June, 2019</li>
                                    </ul>
                                </div>
                                <div class="header-info-right">
                                    <ul class="header-social">
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                       <li> <a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div> -->
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex justify-content-between align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.html"><img src="{{ asset('assets_news/img/logo/Logo-5.png') }}"
                                            class="logo_" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{ asset('assets_news/img/blog/head_.gif') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row d-flex justify-content-between align-items-center">

                            <div class="col-xl-8 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <a href="/"><img src="{{asset('assets_news/img/logo/Logo-2.png')}}"
                                            class="logo_ bg_l" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block header-flex">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('index') }}">होमपेज</a></li>
                                            @foreach ($categories as $category)

                                            <li><a href="{{ route('categories.show',$category->id) }}">{{ $category->name }}</a></li>
                                            {{-- <li><a href="about.html">बिजनेस</a></li>
                                            <li><a href="about.html">विचार</a></li>
                                            <li><a href="about.html">खेलकुद</a></li>
                                            <li><a href="latest_news.html">नवीनतम समाचार</a></li>
                                            <li><a href="contact.html">Contact</a></li> --}}
                                            @endforeach
                                            <li><a href="#">{{ $other->name }}</a>
                                                {{-- <ul class="submenu">
                                                    <li><a href="elements.html"> <i class="fas fa-user user_border"></i>
                                                            &nbsp; Login</a></li>

                                                </ul> --}}
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-4 d-none d-lg-block">
                                <div class="">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#addads"><i
                                            class="fas fa-user user_border"></i> &nbsp;</a>
                                    <i class="fas fa-search special-tag"></i>
                                </div>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                                <!-- <i class="fas fa-user user_border"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
