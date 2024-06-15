@extends('layouts.newsLayout')
@section('content')
<!--================Blog Area =================-->
<section class="blog_area single-post-area pt-20 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class=" mb-30">
                    <div class="">
                        <img src="{{ asset('assets_news/img/hero/header_card.jpg') }}" style="width:100%" alt="">
                    </div>
                </div>
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset('assets_news/img/blog/single_blog_1.png') }}"
                            style="width:100%" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $post->title }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#">{{ $post->category->name }}</a></li>
                            <li>&nbsp; &nbsp; <i class="fa fa-calendar"></i>
                                {{ $post->created_at }}
                            </li>
                            <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                                {{ $post->user->name }}</li>
                        </ul>
                        <div>
                            {!! $post->description !!}
                        </div>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                            people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>

                </div>

                <div class="comments-area">
                    <h4>{{ $post->comments->count() }} Comments</h4>
                    @foreach ($post->comments as $comment)
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="assets/img/comment/comment_1.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        {{ $comment->content }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Commented by {{ $comment->user->name }}</a>
                                            </h5>
                                            <p class="date">{{ $comment->created_at }} </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="{{ route('posts.comments.store', $post->slug) }}"
                        id="commentForm" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="5"
                                        placeholder="Write Comment"></textarea>
                                </div>
                                @error('content')
                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                Message</button>
                        </div>
                    </form>
                </div>


            </div>


            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget ">
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}" alt="">
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach ($recentPosts as $posts_data)
                        <div class="media post_item">
                            <img src="#" alt="post" width="50px">
                            <div class="media-body">
                                <a href="{{ route('post', $posts_data->slug) }}">
                                    <h3>{{ $posts_data->title }}</h3>
                                </a>
                                <p>{{ $posts_data->created_at }}</p>
                            </div>
                        </div>
                        @endforeach

                    </aside>

                    <aside class="single_sidebar_widget ">
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}" alt="">
                    </aside>


                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->

@endsection