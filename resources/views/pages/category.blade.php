@extends('layouts.newsLayout')

@section('content')

<div class="trending-area fix mt-5">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    @foreach ($posts as $post)
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            <img src="{{ Storage::url($post->path)}} " alt="{{ $post->title }} Image">
                            <div class="trend-top-cap">
                                <span>{{ $post->category->name }} </span>
                                <h2 class="text_limit"><a href="{{ route('posts.show',$post->slug) }}">{{ $post->title }}</a></h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($trendings as $trending)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ Storage::url($trending->path) }}" alt="{{ $trending->title }} Image" >
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1 text_limit">{{ $trending->category->name }}</span>
                                        <h4 class="text_limit"><a href="{{ route('posts.show',$trending->slug) }}">{{ $trending->title }}</a></h4>
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
                    </aside>
                    @endforeach

                </div>
            </div>
            {{ $categories->links() }}
        </div>
    </div>
</div>

@endsection