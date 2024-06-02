@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Posts</h1>
        </div>
        <div class="card-body">

            <p class="fs-6 fw-light text-muted">
                {{ $post->title }}
            </p>
            <div class="d-flex ">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{ $post->views }} </a>
                </div>
                <div>
                    <span>{{ $post->category->name }}</span>
                </div>
                <div>
                    <span>{{ $post->meta_tag }}</span>
                </div>
                <div>
                    <span>{{ $post->meta_keyword }}</span>
                </div>
                <div>
                    <span>{{ $post->status }}</span>
                </div>
                <div>
                    <span>{{ $post->description }}</span>
                </div>
                <div>
                    <img src="{{Storage::url($post->path) }}" alt="{{ $post->title.' Image' }}" width="300px">
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $post->created_at }} </span>
                </div>
            </div>
        </div>



    </section>
</div>
@endsection
