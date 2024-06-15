@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>News Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Post</a></div>
                    <div class="breadcrumb-item">News Edit</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>News Post</h4>
                            </div>
                            <div class="card-body">
                                {{-- {{ dd($post->category) }} --}}
                                <form id="news_edit" method="post"  action="{{ route('posts.update',$post->slug) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Post Language</label>
                                                <select class="form-control" name="language">
                                                    <option value="df">Select</option>
                                                    <option value="en">English</option>
                                                    <option value="np">Nepali</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Post Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                                                @error('title')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Post Categories</label>

                                                <select class="form-control" name="category" required>
                                                    <option value="{{ $post->category->id }}" selected>{{ $post->category->name }}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->name == $post->category->name ? 'selected':'' }}>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Tag</label>
                                                <input type="text" name="meta_tag" class="form-control" value="{{ $post->meta_tag }}">
                                                @error('meta_tag')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <input type="text" name="meta_keyword" class="form-control" value="{{ $post->meta_keyword }}">
                                                @error('meta_keyword')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="image">Images</label>
                                            <input type="file" name="image" class="form-control" value="{{ $post->path }}" accept=".png, .jpeg, .jpg, " >
                                            @error('image')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if (Auth::user()->userType == 'admin')

                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="exampleInputUsername1">Change Author</label>
                                            <select class="form-control" name="user_id" required>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ $user->id == $post->user->id?'selected':'' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @endif

                                        @if($post->path)
                                            <div class="col-lg-4 col-md-12">
                                                <label class="f_text" for="current_image">Current Image</label>
                                                <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title.' Image' }}" height="300" width="300">
                                            </div>
                                        @endif
                                        <div class="col-lg-12 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Post Description</label>
                                                <textarea class="summernote"  name="description" required>{{ $post->description }}</textarea>
                                                @error('description')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Publish</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection
