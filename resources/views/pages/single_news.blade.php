@extends('layouts.newsLayout')
@section('title')
NepaKhabar-{{ $post->title }}
@endsection
@section('content')
<!--================Blog Area =================-->
<section class="blog_area single-post-area pt-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <div class="">
                            @foreach ($advertisements as $advertisement)
                                @if ($advertisement->position == 'abovePicture')
                                    <a href="{{ $advertisement->url }}" target="_blank"><img
                                            src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                            alt="{{ $advertisement->name }} Image"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="single-post">
                    @if($post->path)
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ Storage::url($post->path) }}" class="tranding_image"
                            alt="{{ $post->title }} Image">
                    </div>
                    @else
                    <div class="col-12 mt-3 video-items text-center ">
                        <iframe src="{{ $post->link }}" frameborder="0" class="tranding_image"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    @endif
                    <div class="blog_details">
                        <h2>{{ $post->title }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#">{{ $post->category->name }}</a></li>
                            <li>&nbsp; &nbsp; <i class="fa fa-calendar"></i>
                                {{ toFormattedNepaliDate($post->created_at) }}
                            </li>
                            <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                                {{ $post->user->name }}</li>
                        </ul>
                        <div class="row mb-3">
                            <div class="col-xl-12">
                                <div class="">
                                    @foreach ($advertisements as $advertisement)
                                        @if ($advertisement->position == 'belowTitle')
                                            <a href="{{ $advertisement->url }}" target="_blank"><img
                                                    src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                                    alt="{{ $advertisement->name }} Image"></a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="description-post">
                            {!! $modified_description!!}
                        </div>

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <div class="">
                            @foreach ($advertisements as $advertisement)
                                @if ($advertisement->position == 'aboveLike')
                                    <a href="{{ $advertisement->url }}" target="_blank"><img
                                            src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                            alt="{{ $advertisement->name }} Image"></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info">
                            <span class="align-middle">
                                @if (Auth::check() && Auth::user()->likesPost($post))
                                <form action="{{ route('posts.unlike', $post->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="action_btn"><i class="fas fa-heart"></i></button>
                                    {{ $post->likes->count() }} likes
                                </form>
                                @else
                                <form action="{{ route('posts.like', $post->id) }}" method="post">
                                    @csrf
                                    <button type="submit" class="action_btn"><i class="far fa-heart"></i></button>
                                    {{ $post->likes->count() }} likes
                                </form>
                                @endif
                                <span><i class="fas fa-eye"></i> &nbsp; {{ $post->views }} views</span>
                            </span>Share This Post On Your Friends
                        </p>
                        <span>{{ $post->share }} shares</span>
                        <ul class="social-icons">
                            <li class=""><a
                                    href="{{ route('posts.share', ['post' => $post, 'network' => 'facebook']) }}"
                                    target="_blank"><i class="fab fa-facebook-f share_icon"></i></a></li>
                            <li><a href="{{ route('posts.share', ['post' => $post, 'network' => 'twitter']) }}"
                                    target="_blank"><i class="fab fa-twitter share_icon"></i></a></li>
                            <li><a href="{{ route('posts.share', ['post' => $post, 'network' => 'whatsapp']) }}"
                                    target="_blank"><i class="fab fa-whatsapp share_icon"></i></a></li>
                            <li><a href="{{ route('posts.share', ['post' => $post, 'network' => 'linkedin']) }}"
                                    target="_blank"><i class="fab fa-linkedin share_icon"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <div class="">
                            @foreach ($advertisements as $advertisement)
                                @if ($advertisement->position == 'belowLike')
                                    <a href="{{ $advertisement->url }}" target="_blank"><img
                                            src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                                            alt="{{ $advertisement->name }} Image"></a>
                                @endif
                            @endforeach
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
                                {{-- <div class="thumb mt-4">
                                    <img src="{{ asset('assets_news/img/blog/author.png') }}" alt="">
                            </div> --}}
                            <div class="desc">
                                <p class="bold mb-1">
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
                            <div class="reply-btn hide">
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
                    @endforeach
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
                                {{-- <input type="hidden" name="parent_id" value="{{ $parentComment->id ?? '' }}">
                                <!-- Include this when replying to a comment --> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post
                            Comment</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="blog_right_sidebar">
                <aside class="">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'sidebar4')
                    <aside class="single_sidebar_widget">
                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }} "
                            alt="{{ $advertisement->name }} image">
                    </aside>
                    @endif
                    @endforeach
                </aside>
                <aside class="">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'sidebar2')
                    <aside class="single_sidebar_widget">
                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }} "
                            alt="{{ $advertisement->name }} image">
                    </aside>
                    @endif
                    @endforeach
                </aside>
                <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class=" back_ground_box">Recent Post</h3>
                    @foreach ($recentPosts as $posts_data)
                    <div class="card p-1 mb-1">
                        <a href="{{ route('posts.show', $posts_data->slug) }}">
                            <div class=" row">
                                @if ($posts_data->path)
                                <div class="col-lg-3 col-sm-12">
                                    <img src="{{ Storage::url($posts_data->path) }}" alt="post" class="side_post_img">
                                </div>
                                @else
                                <div class="col-lg-3 col-sm-12">
                                    <iframe src="{{ $posts_data->link }}" frameborder="0" class="side_post_img"
                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                                @endif
                                <div class="col-lg-8">
                                    <div class="media-body pt-1">
                                        <h1 class="text_limit recent_p_h">{{ $posts_data->title }}</h1>

                                        <p class="p-title_size">{{ toFormattedNepaliDate($posts_data->created_at) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </aside>


                <aside class="single_sidebar_widget instagram_feeds">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'sidebar1')
                    <aside class="single_sidebar_widget">
                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }} "
                            alt="{{ $advertisement->name }} image">
                    </aside>
                    @endif
                    @endforeach
                </aside>
                <aside class="single_sidebar_widget instagram_feeds">
                    @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'sidebar3')
                    <aside class="single_sidebar_widget">
                        <img class="side_bar_ads" src="{{ Storage::url($advertisement->ad_path) }} "
                            alt="{{ $advertisement->name }} image">
                    </aside>
                    @endif
                    @endforeach

                </aside>

            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endsection
