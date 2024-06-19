<div class="single-post border mb-3">
    <article>
        <a href="{{ route('posts.show', $post->slug) }}">
            <div class="blog_details justify-content-center">
                <div class="row justify-content-center">
                    <h2 class="text-align-center">{{ $post->title }}</h2>
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
                <div class="row justify-content-center mt-3">
                    <img src="{{ Storage::url($post->path) }}" alt="" class="">
                </div>
                @else
                <div class="col-12 mt-3 video-items text-center ">
                    <iframe src="{{ $post->link }}" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                @endif

            </div>
        </a>

    </article>
</div>
