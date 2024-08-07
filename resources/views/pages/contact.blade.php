@extends('layouts.newsLayout')
@section('title')
NepaKhabar-Contact-Us
@endsection

@section('content')
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">हामीलाई सम्पर्क गनुहाेस् </h2>
                    </div>
                    <div class="col-lg-6">
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'सन्देश लेख्नुहाेस्'" placeholder="सन्देश लेख्नुहाेस्"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'नाम लेख्नुहाेस्'" placeholder="नाम लेख्नुहाेस्">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'विषय'" placeholder="विषय">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>{{ $site->siteName }} Pvt.Ltd
                               </h3>
                                <p>{{ $site->address }}</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3><a href="tel:{{ $site->phone }}">{{ $site->phone }}</a></h3>
                                <p>Call US</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:{{ $site->email }}">{{ $site->email }}</a></h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="weekly2-news-area pt-50 pb-30 yelgray-bg mt-5">
            <div class="container">
                <div class="weekly2-wrapper">
                    <!-- section Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-tittle mb-30">
                                <h1 class="text-white">Recomended</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">

                                    @foreach ($posts as $index => $post)
                                        <div class="swiper-slide">
                                            <a href="{{ route('posts.show', $post->slug) }}">
                                                <div class="news_box">
                                                    <div class="text_side">
                                                        <H1 class="text_limit">{{ $post->title }}</H1>
                                                    </div>
                                                    <img src="assets_news/img/trending/trending_top.jpg" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


    </section>
    <!-- ================ contact section end ================= -->

@endsection
