<div class="single-post border__ mb-3">
    <article>
        <a href="{{ route('posts.show', $post->slug) }}">
            <div class="justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center mb-4">
                    @if ($post->context)
                        <h1 class="latest_news ">{{ $post->context }}</h1>
                    @endif
                    </div>
                    <div class="tranding_text_box mb-2">
                        <h1 class="text_title_h1 text_limit">{{ $post->title }}</h1>
                    </div>
                    <h4 style="" class="sub_heading text_center mb-3 text_limit">{{ $post->sub_title }}</h4>
                </div>
                <ul class="blog-info-link row justify-content-center">
                    <li>
                        @foreach ($post->categories as $category)
                        <a href="{{ route('categories.show', $category) }}">
                            {{ $category->name }} &nbsp;|&nbsp;
                        </a>
                        @endforeach
                    </li>
                    <li>&nbsp; &nbsp; <i class="fa fa-calendar"></i>
                        {{ toFormattedNepaliDate($post->created_at) }}
                    </li>
                    <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                        {{ $post->user->name }}</li>
                </ul>
                @if ($post->path)
                <div class="col-lg-12">
                    <div class="row justify-content-center mt-3 braking_p_img">
                        <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title }}"
                            class="tranding_image">
                    </div>
                    <p class="text_center text_limit mt-3">{{ $post->image_desc }}</p>

                </div>

                @else
                <div class="col-12 mt-3 video-items ">
                    <iframe src="{{ $post->link }}" frameborder="0" width="100%" height="600" class=""
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                        <p class="mt-3 text_center text_limit">{{ $post->image_desc }}</p>
                </div>
                @endif
            </div>
        </a>

    </article>
</div>
