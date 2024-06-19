@extends('layouts.newsLayout')
@foreach ($posts as $post)
    @section('title')
        NepaKhabar-{{ $post->category->name }}
    @endsection
@endforeach

@section('content')

<div class="trending-area fix mt-5 mb-50">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($posts as $trending)
                            <div class="col-lg-3 p-2 pt-1">
                                <div class="single-bottom mb-35 p-2 card">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ Storage::url($trending->path) }}" alt="{{ $trending->title }} Image" class="post_img_h">
                                    </div>
                                    <div class="trend-bottom-cap">
                                       
                                        <h4 class="text_limit"><a href="{{ route('posts.show',$trending->slug) }}">{{ $trending->title }}</a></h4>
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
                                                <img src="{{ Storage::url($trending->path) }}"
                                                    alt="{{ $trending->title }} Image">
                                            </div>
                                            <div class="trend-bottom-cap">
                                                <span class="color1 text_limit">{{ $trending->category->name }}</span>
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
                </div>
              
            </div>
        </div>
    </div>
@endsection
