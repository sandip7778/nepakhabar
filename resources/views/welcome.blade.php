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

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-12">
                            <div class="">
                                <img src="assets_news/img/hero/header_card.jpg" style="width:100%" alt="">
                            </div>
                        </div>
                    </div>
                    @if ($posts->count())
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
                                                    {{ toFormattedNepaliDate($post->created_at) }}
                                                </li>
                                                <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                                                    {{ $post->user->name }}</li>
                                            </ul>
                                            <div class="row justify-content-center mt-3">
                                                <img src="{{ Storage::url($post->path) }}" alt="" class="">
                                            </div>
                                        </div>
                                    </a>

                                </article>
                            </div>
                        @endforeach
                    @else
                        @if (request()->has('search'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                No posts found for the search term"{{ request()->input('search') }}".
                                <button type="button" class="btn-close action_btn" data-bs-dismiss="alert"
                                    aria-label="Close">X</button>
                            </div>
                        @endif
                    @endif


                    <hr>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            @foreach ($trendings->take(1) as $trending)
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{ Storage::url($trending->path) }}" alt="{{ $trending->title }}">
                                        <div class="trend-top-cap">
                                            <h2 class="text_limit"><a
                                                    href="{{ route('posts.show', $trending->slug) }}">{{ $trending->title }}</a>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach ($trendings->skip(1) as $trending)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="{{ Storage::url($trending->path) }}"
                                                        alt="{{ $trending->title }}">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color1">{{ $trending->category->name }}</span>
                                                    <h4 class="text_limit"><a
                                                            href="{{ route('posts.show', $trending->slug) }}">{{ $trending->title }}</a>
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
                                <h3 class="text-white">Weekly Top News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($weeklyTopPosts as $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <div class="weekly2-single ">
                                                    <div class="weekly2-img">
                                                        <img src="{{ Storage::url($post->path) }}" alt="">
                                                    </div>
                                                    <div class="weekly2-caption">
                                                        <span class="color1">{{ $post->category->name }}</span>
                                                        <p>{{ toFormattedNepaliDate($post->created_at) }}</p>
                                                        <h4 class="text_limit text-white"><a
                                                                href="#">{{ $post->title }}</a>
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

        @foreach ($categories as $category)
            @if ($category->id !== 1)
                <div class="weekly2-news-area pt-50 pb-30 yelgray-bg mt-5">
                    <div class="container">
                        <div class="weekly2-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-30">
                                        <h1 class="text-white"><a
                                                href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="swiper mySwiper">
                                        <div class="swiper-wrapper">

                                            @foreach ($category->posts as $post)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('posts.show', $post->slug) }}">
                                                        <div class="news_box">
                                                            <div class="text_side">
                                                                <H1 class="text_limit">{{ $post->title }}</H1>
                                                            </div>
                                                            <img src="{{ Storage::url($post->path) }}"
                                                                alt="{{ $post->title }}">
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
            @endif
        @endforeach


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
                                            <div class="swiper-slide">
                                                <div class="single-recent mb-100">
                                                    <div class="what-img">
                                                        <img src="{{ Storage::url($recentArticle->path) }}"
                                                            alt="{{ $recentArticle->title }} image.">
                                                    </div>
                                                    <div class="what-cap">
                                                        <span class="color1">{{ $recentArticle->category->name }}</span>
                                                        <h4 class="text_limit"><a
                                                                href="{{ route('posts.show', $recentArticle->slug) }}">{{ $recentArticle->title }}</a>
                                                        </h4>
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
