@include('inc.header')

<!--================Blog Area =================-->
<section class="blog_area single-post-area pt-20 pb-50">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 posts-list">
                <div class=" mb-2">
                    <div class="">
                        <img src="{{ asset('assets_news/img/hero/header_card.jpg')}}" style="width:100%" alt="">
                    </div>
                </div>
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset('assets_news/img/blog/single_blog_1.png')}}"
                            style="width:100%" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $post->title }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
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
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u="><i
                                        class="fab fa-facebook-f"></i></a></li>
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
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{asset('assets_news/img/blog/author.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Multiply sea night grass fourth day sea lesser rule open subdue female fill
                                        which them
                                        Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Emilly Blunt</a>
                                            </h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{asset('assets_news/img/blog/author.png')}}" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Multiply sea night grass fourth day sea lesser rule open subdue female fill
                                        which them
                                        Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Emilly Blunt</a>
                                            </h5>
                                            <p class="date">December 4, 2017 at 3:12 pm </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="comment-form">
                    <h4>Comment</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="5"
                                        placeholder="Write Comment..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                Message</button>
                        </div>
                    </form>
                </div>

                <div class=" mb-2">
                    <div class="">
                        <img src="{{ asset('assets_news/img/hero/header_card.jpg')}}" style="width:100%" alt="">
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

                        <img class="side_bar_ads" src="{{asset('assets_news/img/post/post_7.png')}}" alt="">
                    </aside>
                   
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @foreach ($categories as $category)
                            <li>
                                <a href="{{route('content',$category->id)}}" class="d-flex">
                                    <p>{{$category->name}}</p>
                                    <p>(0)</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @foreach ($posts as $posts_data)
                        <div class="media post_item">
                            <img src="{{$posts_data->path}}" alt="post">
                            <div class="media-body">
                                <a href="{{route('post',$posts_data->slug)}}">
                                    <h3>{{$posts_data->title}}</h3>
                                </a>
                                <p>{{$posts_data->created_at}}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                   
                    <aside class="single_sidebar_widget ">
                        <!-- size of sidebar ads boxads  height :300px width 350px  -->
                        <img class="side_bar_ads" src="{{asset('assets_news/img/post/post_7.png')}}" alt="">
                    </aside>

                  
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->


@include('inc.footer')