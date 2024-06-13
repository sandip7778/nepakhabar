@extends('layouts.newsLayout')

@section('content')

<div class="trending-area fix mt-5">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            <img src="{{asset('assets_news/img/trending/trending_top.jpg')}}" alt="">
                            <div class="trend-top-cap">
                                <span>times </span>
                                <h2 class="text_limit"><a href="details.html">बालाजु बाइसधारा : मल्लकालीन सम्पदा, धार्मिक आस्थाको केन्द्र बालाजु बाइसधारा : मल्लकालीन सम्पदा, धार्मिक आस्थाको केन्द्र बालाजु बाइसधारा : मल्लकालीन सम्पदा, धार्मिक आस्थाको केन्द्र</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{asset('assets_news/img/trending/trending_top.jpg')}}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1 text_limit">Times</span>
                                        <h4 class="text_limit"><a href="details.html">Detials</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{asset('assets_news/img/trending/trending_top.jpg')}}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">Times</span>
                                        <h4><a href="details.html">Detials</a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{asset('assets_news/img/trending/trending_top.jpg')}}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">Times</span>
                                        <h4><a href="details.html">Detials</a></h4>
                                    </div>
                                </div>
                            </div>


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
                    </aside>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
