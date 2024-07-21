
<div class="single-post border__ mb-3">
    <article>
        <a href="{{ route('posts.show', $post->slug) }}">
            <div class="justify-content-center">

                <div class="col-lg-12">
                    <div class="d-flex justify-content-center ">
                        <h3 style="color:red;">{{ $post->context }}</h3>
                    </div>
                    <div class="tranding_text_box ">
                        <h1 class="">{{ $post->title }}</h1>
                    </div>
                    <h4 style="font-weight: 600">{{ $post->sub_title }}</h4>
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
                <span style="font-weight: 500">{{ $post->image_desc }}</span>

                </div>

                @else
                <div class="col-12 mt-3 video-items ">
                    <iframe src="{{ $post->link }}" frameborder="0" class="tranding_image"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                        <span style="font-weight: 500">{{ $post->image_desc }}</span>
                </div>
                @endif
            </div>
        </a>

    </article>
</div>
