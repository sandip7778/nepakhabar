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
                                    @foreach ($HomeTranding as $post)
                                    <li class="news-item">{{ $post->title }}</li>
                                    @endforeach

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
                @foreach ($HomeTranding as $index => $post)
                <div class="single-post border mb-3">
                    <article>
                        <a href="{{ route('posts.show', $post->slug) }}">
                            <div class="blog_details justify-content-center">

                                <div class="col-md-12 text-align-center row justify-content-center">
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
                                <div class="col-md-12 row justify-content-center mt-3 post_img_box">
                                    <img src="{{ Storage::url($post->path) }}" alt="" class="post_images">
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
                                    <h2 class="text_limit text-white"><a href=""></a> This isddjfoskdfkdomko</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($posts as $index => $post)
                                <div class="col-lg-4">
                                    <div class="single-bottom card p-2 mb-2 mb-35">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <div class="trend-bottom-img mb-30">
                                                <img src="{{ Storage::url($post->path) }}" alt="" class="post_img_h">
                                            </div>
                                            <div class="trend-bottom-cap">

                                                <h4 class="text_limit"><a
                                                        href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                                </h4>
                                            </div>
                                        </a>

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

                        @if ($advertisement->position == 'sidebar1')
                        <aside class="single_sidebar_widget mb-2">
                            <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                alt="">
                        </aside>
                        @endif
                        @if ($advertisement->position == 'sidebar2')
                        <aside class="single_sidebar_widget mb-2">
                            <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                alt="">
                        </aside>
                        @endif
                        @if ($advertisement->position == 'sidebar3')
                        <aside class="single_sidebar_widget mb-2">
                            <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }}"
                                alt="--">
                        </aside>
                        @endif


                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="weekly-news-area mt-50">
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

    <div class="weekly2-news-area pt-50 pb-30 ">
        <div class="container dark-bg pt-30 pb-30">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3 class="text-white">Weekly Top News</h3>
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
                                                <img src="{{ Storage::url($post->path) }}" alt="" class="post_img_h">
                                            </div>
                                            <div class="weekly2-caption">
                                                <span class="color1">{{ $post->category->name }}</span>
                                                <p>{{ $post->created_at->format('d-M') }}</p>
                                                <h4 class="text_limit text-white"><a href="#">{{ $post->title }}</a>
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

    <div class="trending-area fix mt-150 ">
        <div class="container gray-bg pt-30 ">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h1 class="text-dark">विचार
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                <img src="assets_news/img/trending/trending_top.jpg" alt="">
                                <div class="trend-top-cap">
                                    <h2 class="text_limit"><a href=""></a> This isddjfoskdfkdomko</h2>
                                </div>
                            </div>
                        </div>
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($posts as $index => $post)
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35 card p-3">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ Storage::url($post->path) }}" alt="" class="post_img_h">
                                        </div>
                                        <div class="trend-bottom-cap">

                                            <h4 class="text_limit"><a
                                                    href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
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
                        <aside class="single_sidebar_widget popular_post_widget">
                            @foreach ($posts as $index => $post)
                            <div class="card p-2 mb-1">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <div class=" row">
                                        <div class="col-lg-3 col-sm-12">
                                            <img src="{{ Storage::url($post->path) }}" alt="post" class="side_post_img">
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="media-body">

                                                <h1 class="text_limit p-title_size">{{ $post->title }}</h1>

                                                <p>{{ $post->created_at->format('d/M/Y') }}</p>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            @endforeach
                        </aside>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="weekly-news-area pt-50 ">
        <div class="container">
            <!-- Advertisment box   -->
            <div class="row mb-5">
                {{-- <div class="col-xl-12">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'center1')
                    <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                alt="{{ $advertisement->name }} Image">
                @endif
                @endforeach
            </div> --}}
        </div>
    </div>
    </div>
    <hr>

    <div class="weekly2-news-area pt-50 pb-30  mt-5">
        <div class="container yelgray-bg pt-30 pb-30">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h1 class="text-white">साहित्य</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">

                                @foreach ($posts as $index => $post)
                                <div class="swiper-slide ">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <div class="news_box">
                                            <div class="text_side">
                                                <H1 class="text_limit">{{ $post->title }}</H1>
                                            </div>
                                            <img src="{{ Storage::url($post->path) }}" alt="">
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
                                <div class="swiper-slide card p-2 ">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <div class="weekly2-single ">
                                            <div class="weekly2-img">
                                                <img src="{{ Storage::url($post->path) }}"
                                                    alt="{{ $post->title }} image" class="post_img_h">
                                            </div>
                                            <div class="weekly2-caption">
                                                <span class="color1">{{ $post->category->name }}</span>
                                                <p>{{ $post->created_at->format('d-M') }}</p>
                                                <h4 class="text_limit"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
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
    {{-- <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @foreach ($videos->take(1) as $video)
                    <div class="video-items-active">
                        <div class="video-items text-center">
                            <iframe src="https://www.youtube.com/embed/r1aDcD1q6mo?si=-fJzERyvPpxPizF4" frameborder="0"
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
                            <div class="bottom-caption overflow">
                                <h2>{{ $video->title }}</h2>
                                <div>{!! $video->description !!}</div>
                            </div>
                            @endforeach

                            <div class="row mb-5">
                                <div class="col-xl-12">
                                    <div class="">
                                        @foreach ($advertisements as $advertisement)
                                        @if ($advertisement->position == 'footer')
                                        <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                            alt="">
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
    </div> --}}

    <div class="trending-area fix mt-150 ">
        <div class="container gray-bg pt-30 ">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h1 class="text-dark">विचार
                            </h1>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- Trending Top -->
                       
                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                                @foreach ($posts as $index => $post)
                                <div class="col-lg-3">
                                    <div class="single-bottom mb-35 card p-3">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ Storage::url($post->path) }}" alt="" class="post_img_h">
                                        </div>
                                        <div class="trend-bottom-cap">

                                            <h4 class="text_limit"><a
                                                    href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
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
                   
                </div>

            </div>
        </div>
    </div>


    <div class="recent-articles mt-100 mb-100">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent dot-style d-flex dot-style">
                            <div class="swiper recentMy">
                                <div class="swiper-wrapper">

                                    @foreach ($recentArticles as $recentArticle)
                                    <a href="{{ route('posts.show', $recentArticle->slug) }}">
                                        <div class="swiper-slide">
                                            <div class="single-recent mb-100">
                                                <div class="what-img">
                                                    <img src="{{ Storage::url($recentArticle->path) }}" alt="image."
                                                        class="post_img_h">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{ $recentArticle->category->name }}</span>
                                                    <h4 class="text_limit"><a
                                                            href="{{ route('posts.show',$recentArticle->slug) }}">{{ $recentArticle->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
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