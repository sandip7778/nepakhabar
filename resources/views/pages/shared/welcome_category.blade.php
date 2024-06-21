<div class="weekly-news-area ">
    <div class="container">
        <!-- Advertisment box   -->
        <div class="row mb-5">
            <div class="col-xl-12">
                @foreach ($advertisements as $advertisement)
                @if ($advertisement->position == 'center3')
                <a href="{{ $advertisement->url }}" target="_blank"><img
                        src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%"
                        alt="{{ $advertisement->name }}  फाेटाे"></a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="weekly2-news-area pt-50 pb-30  mt-10 mb-10">
    <div class="container yelgray-bg p-3 card">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row btn-border ml-1 mr-1">
                <div class="col-lg-10">
                    <div class="section-tittle ">
                        <h1 class=""><a class="back_ground_box"
                                href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-2 hide_800 mt-3">
                    <div class="more">
                        <a href="{{ route('categories.show', $category->id) }}" class="text-white">>></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
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
                                        @if ($post->path)
                                        <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title }} फाेटाे">
                                        @else
                                        <iframe src="{{ $post->link }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        @endif

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
