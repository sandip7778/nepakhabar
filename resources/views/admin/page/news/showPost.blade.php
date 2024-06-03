@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Posts</h1>
        </div>
        <div class="card-body">
            <div class="d-flex flex-column">
                <div class="card-title">
                    <h5 class="card-title">Title:</h5>

                    <span> {{ $post->title }}</span>
                </div>
                <div class="card-title">
                    <h5 class="card-title">Category:</h5>
                    <span> {{ $post->category->name }}</span>
                </div>
                <div class="card-title">
                    <h5 class="card-title">Meta Tag:</h5>
                    <span> {{ $post->meta_tag }}</span>
                </div>
                <div class="card-title">
                    <h5 class="card-title">Meta Keyword:</h5>
                    <span> {{ $post->meta_keyword }}</span>
                </div>
                <div class="col-3">
                    <h5 class="card-title">Status</h5>
                    <span>@if ( $post->status  == 1)
                        Active
                    @else
                        Deactive
                    @endif</span>
                </div>
                <div class="card-text ">
                    <h5 class="card-title">Description </h5>
                    <div class="border border-dark p-2">
                    <span>{!! $post->description !!}</span>
                </div>
                </div>
                <div >
                    <h5 class="card-title">Image</h5>
                    <img src="{{Storage::url($post->path) }}" alt="{{ $post->title.' Image' }}" width="300px">
                </div>
                <div class="card-title">
                    <h5 class="card-title">Posted At</h5>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $post->created_at }} </span>
                </div>
            </div>
            <a href="{{ route('posts.edit', $post->slug) }}" class="action_btn"><button type="button" class="btn btn-warning" data-bs-dismiss="modal">Edit</button></i></a>
            <a href="{{ route('posts.destroy', $post->slug) }}" class="action_btn"><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button></a>
        </div>



    </section>
</div>
@endsection
