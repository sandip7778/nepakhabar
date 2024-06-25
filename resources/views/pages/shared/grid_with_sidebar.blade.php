<div class="weekly-news-area ">
    <div class="container">
        <!-- Advertisment box   -->
        <div class="row mb-5">
            <div class="col-xl-12">
                @foreach ($advertisements as $advertisement)
                    @if ($advertisement->position == 'center2')
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
    <div class="container gray-bg p-2">
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
        <div class="row mt-5 ml-1">
            <div class="col-lg-8">
                <!-- Trending Top -->
                @foreach ($category->posts->take(1) as $posts_data)
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            <img src="{{ Storage::url($posts_data->path) }}" alt="{{ $posts_data->title }}  फाेटाे"
                                class="tranding_image">
                            <div class="trend-top-cap">
                                <h2 class="text_limit text-red">
                                    <a href="{{ route('posts.show', $posts_data->slug) }}">{{ $posts_data->title }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Trending Bottom -->
                <div class="trending-bottom">
                    <div class="row">

                        @foreach ($category->posts as $posts_data)
                            <div class="col-lg-6">
                                <div class="card p-2 mb-1">
                                    <a href="{{ route('posts.show', $posts_data->slug) }}">
                                        <div class="flex_data">
                                            <div class="">
                                                @if ($posts_data->path)
                                                    <img src="{{ Storage::url($posts_data->path) }}"
                                                        alt="{{ $posts_data->title }}" class="side_post_img">
                                                @else
                                                    <iframe src="{{ $posts_data->link }}" frameborder="0"
                                                        class="side_post_img"
                                                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen></iframe>
                                                @endif

                                            </div>
                                            <div class="col-lg-8 col-sm-4">
                                                <div class="media-body pt-1">
                                                    <h1 class="text_limit recent_p_h">{{ $posts_data->title }}</h1>

                                                    <p class="p-title_size">
                                                        {{ toFormattedNepaliDate($posts_data->created_at) }}</p>
                                                </div>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                {{-- <a href="{{ route('posts.show', $post->slug) }}">
                            <div class="single-bottom mb-35 p-2 card">
                                <div class="trend-bottom-img mb-30">
                                    <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title }}"
                                        class="post_img_h">
                                </div>
                                <div class="trend-bottom-cap">
                                    <span class="color1 text-dark">{{ $category->name }}</span>
                                    <h4 class="text_limit"><a
                                            href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                </div>
                            </div>
                            </a> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Riht content -->
            <!-- size of sidebar ads boxads  height :300px width 350px  -->
            <div class="col-lg-4">
                @foreach ($advertisements as $advertisement)
                    @if ($advertisement->category_id == $category->id)
                            @if ($advertisement->position == 'sidebar1')
                        <aside class="single_sidebar_widget mb-4">
                            <a href="{{ $advertisement->url }}" target="_blank"><img class="side_bar_ads"
                                        src="{{ Storage::url($advertisement->ad_path) }}"
                                        alt="{{ $advertisement->name }} Image"></a>
                        </aside>
                        @endif
                            @if ($advertisement->position == 'sidebar2')
                        <aside class="single_sidebar_widget mb-4">
                            <a href="{{ $advertisement->url }}" target="_blank"><img class="side_bar_ads"
                                        src="{{ Storage::url($advertisement->ad_path) }}"
                                        alt="{{ $advertisement->name }} Image"></a>
                        </aside>
                        @endif
                            @if ($advertisement->position == 'sidebar3')
                        <aside class="single_sidebar_widget mb-4">
                                <a href="{{ $advertisement->url }}" target="_blank"><img class="side_bar_ads"
                                        src="{{ Storage::url($advertisement->ad_path) }}"
                                        alt="{{ $advertisement->name }} Image"></a>
                        </aside>
                        @endif
                            @if ($advertisement->position == 'sidebar4')
                        <aside class="single_sidebar_widget mb-4">
                                <a href="{{ $advertisement->url }}" target="_blank"><img class="side_bar_ads"
                                        src="{{ Storage::url($advertisement->ad_path) }}"
                                        alt="{{ $advertisement->name }} Image"></a>
                        </aside>
                            @endif
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</div>
