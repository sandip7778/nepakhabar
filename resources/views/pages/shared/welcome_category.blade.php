<div class="weekly2-news-area pt-50 pb-30 yelgray-bg mt-5">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h1 class="text-white"><a
                                href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">

                            @foreach ($category->posts as $post)
                                <div class="swiper-slide">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        <div class="news_box">
                                            <div class="text_side">
                                                <H1 class="text_limit">{{ $post->title }}</H1>
                                            </div>
                                            <img src="{{ Storage::url($post->path) }}"
                                                alt="{{ $post->title }}">
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
