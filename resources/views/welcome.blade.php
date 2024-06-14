@extends('layouts.newsLayout')


@section('content')
    <main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>अहिले प्रचलनमा</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        @foreach ($posts as $post)
                                            <li class="news-item">{{ $post->title }}</li>
                                        @endforeach
                                        {{-- <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                    <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li> --}}
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mb-5">
                                    <div class="col-xl-12">
                                        <div class="">
                                            <img src="assets_news/img/hero/header_card.jpg" style="width:100%" alt="">
                                        </div>
                                    </div>
                                </div> -->
                    @foreach ($posts as $index => $post)
                        <div class="single-post border mb-3">
                            <article>
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <div class="blog_details justify-content-center">
                                        <div class="row justify-content-center">
                                            <h2 class="text-align-center">{{ $post->title }}</h2>
                                        </div>

                                        <ul class="blog-info-link row justify-content-center">
                                            <li><a href="{{ route('categories.show', $post->category_id) }}">
                                                    {{ $post->category->name }}</a></li>
                                            <li>&nbsp; &nbsp; <i class="fa fa-calendar"></i>
                                                {{ $post->created_at->format('d-M') }}
                                            </li>
                                            <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                                                {{ $post->user->name }}</li>
                                        </ul>
                                        <div class="row justify-content-center mt-3">
                                            <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title . ' Image' }}"
                                                class="tranding_image">
                                        </div>
                                    </div>
                                </a>

                            </article>

                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img src="assets_news/img/trending/trending_top.jpg" alt="">
                                    <div class="trend-top-cap">
                                        <span class="text_limit"> </span>hh</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($posts as $index => $post)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="assets_news/img/trending/trending_bottom1.jpg" alt="">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1">{{ $post->category->name }}</span>
                                                    <h4 class="text_limit"><a href="details.html">{{ $post->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <div class="col-lg-4">
                            @foreach ($advertisements as $advertisement)
                                <aside class="single_sidebar_widget mb-5">
                                    @if ($advertisement->position == 'sidebar1')
                                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                            alt="{{ $advertisement->name }} Image">
                                    @endif
                                    @if ($advertisement->position == 'sidebar2')
                                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                            alt="{{ $advertisement->name }} Image">
                                    @endif
                                    @if ($advertisement->position == 'sidebar3')
                                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                            alt="{{ $advertisement->name }} Image">
                                    @endif

                                </aside>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="weekly-news-area ">
            <div class="container">
                <!-- Advertisment box   -->
                <div class="row mb-5">
                    <div class="col-xl-12">
                        @foreach ($advertisements as $advertisement)
                            @if ($advertisement->position == 'center1')
                                <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                    alt="{{ $advertisement->name }} Image">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="weekly2-news-area pt-50 pb-30 dark-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">

                                    @foreach ($posts as $index => $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <div class="weekly2-single ">
                                                    <div class="weekly2-img">
                                                        <img src="assets_news/img/news/weekly2News1.jpg" alt="">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <span class="color1">{{ $post->category->name }}</span>
                                                        <p>{{ $post->created_at->format('d-M') }}</p>
                                                        <h4 class="text_limit"><a href="#">{{ $post->title }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="weekly-news-area pt-50 ">
            <div class="container">
                <!-- Advertisment box   -->
                <div class="row mb-5">
                    <div class="col-xl-12">
                        @foreach ($advertisements as $advertisement)
                            @if ($advertisement->position == 'center1')
                                <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                    alt="{{ $advertisement->name }} Image">
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="weekly2-news-area pt-50 pb-30 dark-bg mt-5">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">

                                    @foreach ($posts as $index => $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <div class="news_box">
                                                    <div class="text_side">
                                                        <H1>Testing</H1>
                                                    </div>
                                                    <img src="assets_news/img/trending/trending_top.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Weekly-News -->
        <!-- Whats New Start -->
        <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-xl-12">
                        <div class="">
                            @foreach ($advertisements as $advertisment)
                                @if ($advertisement->position == 'center2')
                                    <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                        alt="{{ $advertisement->name }} Image">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">All</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Lifestyle</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Travel</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab"
                                                href="#nav-last" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Fashion</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab"
                                                href="#nav-nav-Sport" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Sports</a>
                                            <a class="nav-item nav-link" id="nav-technology" data-toggle="tab"
                                                href="#nav-techno" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Technology</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews1.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4 class="text_limit"><a href="#">Welcome To The Best
                                                                    Model
                                                                    Winner Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews2.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews3.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews4.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="whats-news-caption">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews1.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews2.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews3.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="assets_news/img/news/whatNews4.jpg" alt="">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="color1">Night party</span>
                                                            <h4><a href="#">Welcome To The Best Model Winner
                                                                    Contest</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-40">
                            <h3>Follow Us</h3>
                        </div>
                        <!-- Flow Socail -->
                        <div class="single-follow mb-45">
                            <div class="single-box">
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets_news/img/news/icon-fb.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets_news/img/news/icon-tw.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets_news/img/news/icon-ins.png"
                                                alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <div class="follow-social">
                                        <a href="#"><img src="assets_news/img/news/icon-yo.png" alt=""></a>
                                    </div>
                                    <div class="follow-count">
                                        <span>8,045</span>
                                        <p>Fans</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- New Poster -->
                        @foreach ($advertisements as $advertisement)
                            @if ($advertisement->position == 'sidebar4')
                                <div class="news-poster d-none d-lg-block">
                                    <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                        alt="{{ $advertisement->name }} Image">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Whats New End -->

        <!--   Weekly2-News start -->
        <div class="weekly2-news-area  weekly2-pading gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row btn-border">
                        <div class="col-lg-10 col-md-4 mb-20">
                            <div class="">
                                <h3>Weekly Top News</h3>
                            </div>
                        </div>
                        {{-- <div class="col-lg-2 d-none d-lg-block">
                            <div class="more">
                                <a href="http://">>></a>
                            </div>
                        </div> --}}

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">

                                    @foreach ($posts as $index => $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <div class="weekly2-single ">
                                                    <div class="weekly2-img">
                                                        <img src="{{ Storage::url($post->path) }}"
                                                            alt="{{ $post->title }} image">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <span class="color1">{{ $post->category->name }}</span>
                                                        <p>{{ $post->created_at->format('d-M') }}</p>
                                                        <h4 class="text_limit"><a href="#">{{ $post->title }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->
        <!-- Start Youtube -->
        <div class="youtube-area video-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @foreach ($videos->take(1) as $video)
                            <div class="video-items-active">
                                <div class="video-items text-center">
                                    <iframe src="{{ $video->url }}" frameborder="0"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>

                            </div>
                    </div>
                </div>
                <div class="video-info">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="video-caption">
                                <div class="top-caption">
                                    <span class="color1">{{ $video->category->name }}</span>
                                </div>
                                <div class="bottom-caption">
                                    <h2>{{ $video->title }}</h2>
                                    <p>{!! $video->description !!}</p>
                                </div>
                                @endforeach

                                <div class="row mb-5">
                                    <div class="col-xl-12">
                                        <div class="">
                                            @foreach ($advertisements as $advertisement)
                                                @if ($advertisement->position == 'footer')
                                                    <img src="{{ Storage::url($advertisement->ad_path) }}"
                                                        style="width:100%" alt="">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testmonial-nav text-center">
                                @foreach ($videos->skip(1) as $video)
                                    <div class="single-video">
                                        <iframe src="{{ $video->url }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        <div class="video-intro">
                                            <h4>{{ $video->title }}</h4>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="recent-articles">
            <div class="container">
                <div class="recent-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h3>Recent Articles</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="recent dot-style d-flex dot-style">
                                <div class="swiper recentMy">
                                    <div class="swiper-wrapper">

                                        @foreach ($recentArticles as $recentArticle)
                                            <div class="swiper-slide">
                                                <div class="single-recent mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ Storage::url($recentArticle->path) }}" alt="{{ $recentArticle->title }} image.">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{ $recentArticle->category->name }}</span>
                                                        <h4 class="text_limit"><a href="{{ route('posts.show',$recentArticle->slug) }}">{{ $recentArticle->title }}</a></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="flaticon-arrow roted"></span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><span
                                                class="flaticon-arrow right-arrow"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End pagination  -->
    </main>
@endsection
