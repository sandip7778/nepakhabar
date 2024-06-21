
<div class="single-post border__ mb-3">
    <article>
        <a href="{{ route('posts.show', $post->slug) }}">
            <div class="justify-content-center">
                <div class="col-lg-12">
                    <div class="tranding_text_box">
                        <h1 class="text_limit">{{ $post->title }}</h1>
                    </div>
                </div>
                <ul class="blog-info-link row justify-content-center">
                    <li><a href="{{ route('categories.show', $post->category_id) }}">
                            {{ $post->category->name }}</a></li>
                    <li>&nbsp; &nbsp; <i class="fa fa-calendar"></i>
                        {{ toFormattedNepaliDate($post->created_at) }}
                    </li>
                    <li>&nbsp; &nbsp; <i class="fa fa-user"></i>
                        {{ $post->user->name }}</li>
                </ul>
                @if ($post->path)
                <div class="col-lg-12">
                    <div class="row justify-content-center mt-3 braking_p_img">
                        <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title }}  फाेटाे" class="tranding_image ">
                    </div>
                </div>

                @else
                <div class="col-12 mt-3 video-items text-center ">
                    <iframe src="{{ $post->link }}" frameborder="0" class="tranding_image"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                @endif

            </div>
        </a>

    </article>
</div>
