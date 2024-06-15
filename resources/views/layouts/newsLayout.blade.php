<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nepa Khabar | </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets_news/img/logo/Logo-1.png') }}">

    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets_news/css/bootstrap.min.css') }}">
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
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex justify-content-between align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('assets_news/img/logo/Logo-5.png') }}" class="logo_"
                                            alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                @foreach ($advertisements as $advertisement)
                                <div class="header-banner f-right ">
                                    @if ($advertisement->position == 'header')
                                    <img src="{{ Storage::url($advertisement->ad_path) }}"
                                        alt="{{ $advertisement->name }} Image" height="100px">
                                    @endif
                                </div>
                                @endforeach
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
                                    <a href="/"><img src="{{ asset('assets_news/img/logo/Logo-2.png') }}"
                                            class="logo_ bg_l" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block header-flex">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('index') }}">होमपेज</a></li>
                                            @foreach ($categories as $category)
                                                @if ($category->id !== 1)
                                                    <li><a
                                                            href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                            @foreach ($categories as $category)
                                                @if ($category->id == 1)
                                                    <li><a
                                                            href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                                                        {{-- <ul class="submenu">
                                                    <li><a href="elements.html"> <i class="fas fa-user user_border"></i>
                                                            &nbsp; Login</a></li>
                                                            </ul> --}}
                                                    </li>
                                                @endif
                                            @endforeach

                                        </ul>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-md-4 d-none d-lg-block">
                                <div class="d-flex">
                                    @auth
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class=""><i class="fas fa-sign-out-alt"></i>
                                            &nbsp;</button>
                                    </form>

                                    @else
                                    <a href="{{ route('login') }}"><i class="fas fa-user user_border"></i>
                                        &nbsp;</a>
                                    @endauth

                                </div>
                            </div>

                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    @yield('content')

    <footer>
        <!-- Footer Start-->
        <div class="footer-area pt-20 fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="/"><img src="{{ asset('assets_news/img/logo/Logo-4.png') }}"
                                            class="logo_" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>{{ $site->metaDescription }}</p>
                                    </div>
                                </div>

                                <!-- contact -->
                                <div class="footer-contact">
                                    <a href="mailto:{{ $site->email }}"><i class="fas fa-envelope icon"></i>
                                        &nbsp;{{ $site->email }} </a> <br>
                                    <a href="tel:{{ $site->phone }}"><i class="fas fa-phone icon"></i>
                                        &nbsp;{{ $site->phone }} </a>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="{{ $site->twitter }}" class="action_btn"><i class="fab fa-twitter icon"></i></a>
                                    <a href="{{ $site->instagram }}" class="action_btn"><i class="fab fa-instagram icon"></i></a>
                                    <a href="{{ $site->facebook }}" class="action_btn"><i class="fab fa-facebook icon"></i></a>
                                    <a href="{{ $site->youtube }}" class="action_btn"><i class="fab fa-youtube icon"></i></a>
                                    <a href="{{ $site->thread }}" class="action_btn"><i class="fa-brands fa-threads"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        <div class="single-footer-caption mt-20">
                            <div class="footer-tittle">
                                <h4>Pages</h4>
                                @foreach ($categories as $category)
                                <li><a href="{{ route('categories.show', $category->id) }}"><span
                                class="flaticon-arrow right-arrow"></span> &nbsp;{{ $category->name }}</a></li>
                                @endforeach
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                        <div class="single-footer-caption mt-20">
                            <div class="footer-tittle">
                                <h4>News Feed</h4>
                            </div>
                            <div class="instagram-gellay">
                                <ul class="insta-feed">
                                    <li><a href="#"><img src="assets_news/img/post/instra1.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center justify-content-between">
                        <div class="col-lg-6">
                            <div class="footer-copy-right">
                                <p>
                                    &copy;
                                    <script>
                                    document.write(new Date().getFullYear());
                                    </script> All rights reserved | Developed by <a href="https://linkupnepal.com"
                                        target="_blank">Linkup Nepal Pvt ltd</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-menu f-right">
                                <ul>
                                    <li><a href="#">Terms of use</a></li>
                                    <li><a href="">Team Members</a></li>
                                    <li><a href="">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('assets_news/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets_news/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('./assets_news/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets_news/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets_news/js/gijgo.min.js') }}"></script>

    <script src="{{ asset('assets_news/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.magnific-popup.js') }}"></script>
    <!-- Breaking New Pluging -->
    <script src="{{ asset('assets_news/js/jquery.ticker.js') }}"></script>
    <script src="{{ asset('assets_news/js/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('assets_news/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('assets_news/js/contact.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets_news/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets_news/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('assets_news/js/plugins.js') }}"></script>
    <script src="{{ asset('assets_news/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        freeMode: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
        },
    });


    var swiper = new Swiper(".recentMy", {
        slidesPerView: 1,
        spaceBetween: 20,
        freeMode: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
    });
    </script>

</body>

</html>
