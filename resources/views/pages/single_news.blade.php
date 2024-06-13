@include('inc.header')

<!--================Blog Area =================-->
<section class="blog_area single-post-area pt-20 pb-50">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 posts-list">
                <div class=" mb-2">
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
                            {!!  $post->description !!}
                        </div>

                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span>Share This
                            Post On Your Friends</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u="><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                  
                </div>
                <div class="blog-author">
                    <div class="media align-items-center">
                        <img src="{{asset('assets_news/img/blog/author.png')}}" alt="">
                        <div class="media-body">
                            <a href="#">
                                <h4>Harvard milan</h4>
                            </a>
                            <p>Second divided from form fish beast made. Every of seas all gathered use saying you're,
                                he
                                our dominion twon Second divided from</p>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h4>{{ $post->comments->count() }} Comments</h4>
                    <div class="comment-list">
                    @foreach ($post->comments as $comment)

                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex flex-column">
                                    @if (!$comment->parent_id)
                                        <div class="thumb mt-4">
                                            <img src="{{ asset('assets_news/img/blog/author.png') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="bold mb-0">
                                                {{ $comment->content }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <small>
                                                        Commented by {{ $comment->user->name }}
                                                    </small>
                                                    <small class="date">{{ $comment->created_at }} </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($comment->replies as $reply)
                                        <div style="margin-left: 30px;">
                                            <p style="margin-bottom: 0px">{{ $reply->content }}</p>
                                            <small>Replied by {{ $reply->user->name }}</small>
                                            <small> on {{ $reply->updated_at }}</small>
                                        </div>
                                    @endforeach
                                    @if (!$comment->parent_id)
                                    <div class="reply-btn">
                                        <form action="{{ route('posts.comments.store', $post->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                            <textarea name="content" required></textarea>
                                            <button type="submit" class="btn-outline-info btn-sm">Reply</button>
                                        </form>
                                        {{-- <a href="#" class="btn-reply text-uppercase">reply</a> --}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="comment-form">
                    <h4>Comment</h4>

                    <form class="form-contact comment_form" action="{{ route('posts.comments.store', $post->slug) }}"
                        id="commentForm" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="content" id="comment" cols="30" rows="5"
                                        placeholder="Write Comment..."></textarea>
                                    @error('content')
                                        <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                    @enderror
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    {{-- <input type="hidden" name="parent_id" value="{{ $parentComment->id ?? '' }}"> <!-- Include this when replying to a comment --> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post
                                Comment</button>
                        </div>
                    </form>
                </div>

                <div class=" mb-2">
                    <div class="">
                        <img src="{{ asset('assets_news/img/hero/header_card.jpg') }}" style="width:100%"
                            alt="">
                    </div>
                </div>

                <div class="weekly2-news-area pt-20 pb-30 gray-bg mt-5">
                    <div class="container">
                        <div class="weekly2-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-30">
                                        <h3 class="">Recomended</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="swiper single_blog">
                                        <div class="swiper-wrapper">
                                            @foreach ($posts as $index => $post)
                                            <div class="swiper-slide">
                                                <a href="{{ route('post',$post->slug)}}">
                                                    <div class="news_box h15">
                                                        <div class="text__">
                                                            <h1 class="text-white text_limit">गण्डकीको मुख्यमन्त्रीमा
                                                                सुरेन्द्रराज पाण्डे नियुक्त</h1>
                                                        </div>

                                                        <img src="{{asset('assets_news/img/blog/Oleg-Kononenko-768x512.jpg')}}"
                                                            alt="">
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

            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- size of sidebar ads boxads  height :300px width 350px  -->
                    <aside class="single_sidebar_widget ">

                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}" alt="">
                    </aside>
                   
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="#" class="d-flex">
                                    <p>{{$category->name}}</p>
                                    <p>(0)</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach ($recentPosts as $posts_data)
                            <div class="media post_item">
                                <img src="{{ Storage::url($posts_data->path) }}" alt="post" width="50px">
                                <div class="media-body">
                                    <a href="{{ route('showNews', $posts_data->slug) }}">
                                        <h3>{{ $posts_data->title }}</h3>
                                    </a>
                                    <p>{{ $posts_data->created_at }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                   
                    <aside class="single_sidebar_widget ">
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}"
                            alt="">
                    </aside>

                  
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->


@include('inc.footer')
