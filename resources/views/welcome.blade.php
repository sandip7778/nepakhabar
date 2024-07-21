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
                            <h1 class="latest_news">ताजा समाचार</h1>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="p-1">
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
                            @foreach ($advertisements as $advertisement)
                            @if ($advertisement->position == 'center1')
                            <a href="{{ $advertisement->url }}" target="_blank"><img
                                    src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                    alt="{{ $advertisement->name }} Image"></a>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                @if ($posts->count())
                @foreach ($posts as $index => $post)
                @include('pages.shared.welcome_post')
                @endforeach
                @else
                @if (request()->has('search'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    No posts found for the search term "{{ request()->input('search') }}".
                    <button type="button" class="btn-close action_btn" data-bs-dismiss="alert"
                        aria-label="Close">X</button>
                </div>
                @endif
                @endif

                <div class="row mt-5">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        @foreach ($trendings->take(1) as $trending)
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                @if ($trending->path)
                                <img src="{{ Storage::url($trending->path) }}" alt="{{ $trending->title }}"
                                    class="tranding_image">
                                @else
                                <iframe src="{{ $trending->link }}" frameborder="0" width="100%" height="600" class="tranding_image"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                @endif
                                <div class="trend-top-cap">
                                    <h2 class="text_limit ">
                                        <a href="{{ route('posts.show', $trending->slug) }}" class="text-red">{{ $trending->title }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-12">
                            <div class="">
                                @foreach ($advertisements as $advertisement)
                                @if ($advertisement->position == 'sidebar1')
                                <a href="{{ $advertisement->url }}" target="_blank"><img
                                        src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                        alt="{{ $advertisement->name }} Image"></a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @foreach ($categories as $category)
        @if ($category->block == 1)
        @include('pages.shared.grid_design_cat')
        @endif
        @endforeach

        @foreach ($categories as $category)
        @if ($category->block == 2)
        @include('pages.shared.welcome_category')
        @endif
        @endforeach

        @foreach ($categories as $category)
        @if ($category->block == 3)
        @include('pages.shared.grid_with_sidebar')
        @endif
        @endforeach

        <div class="weekly2-news-area pt-50 pb-50 mt-50 mb-50 dark-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row btn-border ml-1 mr-1">
                                <div class="col-lg-10">
                                    <div class="section-tittle ">
                                        <h1 class=""><a class="back_ground_box" href="#">साप्ताहिक मुख्य समाचार
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                                <div class="col-lg-2 hide_800 mt-3">
                                    <div class="more">
                                        <a href="" class="text-white">>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($weeklyTopPosts as $post)
                                    <div class="swiper-slide card">
                                        <a href="{{ route('posts.show', $post->slug) }}">
                                            <div class="weekly2-single ">
                                                <div class="weekly2-img">
                                                    @if ($post->path)
                                                    <img src="{{ Storage::url($post->path) }}" alt=""
                                                        class="post_img_h">
                                                    @else
                                                    <iframe src="{{ $post->link }}" frameborder="0" class="post_img_h"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                    @endif

                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">{{ $post->category->name }}</span>
                                                    <p>{{ toFormattedNepaliDate($post->created_at) }}</p>
                                                    <h4 class="text_limit text-dark"><a
                                                            href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</main>

@endsection