@include('inc.header')

<!--================Blog Area =================-->
<section class="blog_area single-post-area pt-20">
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
                            {!! $post->description !!}
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
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('showNews',$post->slug)) }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url={{ urlencode(route('showNews',$post->slug)) }}&text={{ urlencode($post->title) }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="whatsapp://send?text={{ urlencode($post->title . ' ' . route('showNews',$post->slug)) }}" data-action="share/whatsapp/share" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?url={{ urlencode(route('showNews',$post->slug)) }}" target="_blank"><i class="fab fa-linkedin" ></i></a></li>
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
                                        <img src="{{ asset('assets_news/img/blog/author.png') }}" alt="">
                                    </div>
                                    <div class="desc">
                                        <p class="comment">
                                            {{ $comment->content }}
                                        </p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h5>
                                                    <a href="#">{{ $comment->user->name }}</a>
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
                    <h4>Comment</h4>
                    @include('admin.shared.success')
                    <form class="form-contact comment_form" action="{{ route('storeComment', $post->slug) }}"
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
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <!-- size of sidebar ads boxads  height :300px width 350px  -->
                    <aside class="single_sidebar_widget ">

                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}" alt="">
                    </aside>
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btns" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Search</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>{{ $category->name }}</p>
                                        <p>({{ $category->posts->count() }})</p>
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
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget ">
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <img class="side_bar_ads" src="{{ asset('assets_news/img/post/post_7.png') }}"
                            alt="">
                    </aside>

                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->


@include('inc.footer')
