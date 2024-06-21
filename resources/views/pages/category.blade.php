@extends('layouts.newsLayout')
@foreach ($posts as $post)
@section('title')
NepaKhabar-{{ $post->category->name }}
@endsection
@endforeach

@section('content')


<div class="weekly2-news-area gray-bg pt-50 pb-30 mt-50 mb-50">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-bottom">
                   
                    <div class="row">
                        @foreach ($posts as $trending)
                        <div class="col-lg-3 p-2 pt-1">
                            <div class="single-bottom mb-35 p-2 card">
                                <div class="trend-bottom-img mb-30">
                                    <img src="{{ Storage::url($trending->path) }}" alt="{{ $trending->title }} Image"
                                        class="post_img_h">
                                </div>
                                <div class="trend-bottom-cap">

                                    <h4 class="text_limit"><a
                                            href="{{ route('posts.show',$trending->slug) }}">{{ $trending->title }}</a>
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

@endsection