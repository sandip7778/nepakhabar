<div class="weekly-news-area ">
    <div class="container">
        <!-- Advertisment box   -->
        <div class="row mb-5">
            <div class="col-xl-12">
                @foreach ($advertisements as $advertisement)
                @if ($advertisement->position == 'center1')
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
    <div class="container gray-bg p-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="trending-bottom">
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
                    <div class="row mt-5">
                        @foreach ($category->posts as $post)
                        <div class="col-lg-3">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                <div class="single-bottom mb-35 p-2 card">
                                    <div class="trend-bottom-img mb-30">
                                        @if ($post->path)
                                        <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title }}  फाेटाे"
                                            class="post_img_h">
                                        @else
                                        <iframe src="{{ $post->link }}" frameborder="0" class="post_img_h"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        @endif


                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color1">{{ $category->name }}</span>
                                        <h4 class="text_limit"><a
                                                href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                                        </h4>
                                    </div>
                                </div>
                            </a>

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
