@extends('admin/include/masterlayout')
@section('title')
    Edit News
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>News Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></div>
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
                                                <label>Post Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ old('title',$post->title) }}" required>
                                                @error('title')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Sub-Title</label>
                                                <input type="text" name="sub_title" class="form-control"
                                                    value="{{ old('sub_title', $post->sub_title) }}">
                                                @error('sub_title')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Context</label>
                                                <input type="text" name="context" class="form-control"
                                                    value="{{ old('context', $post->context) }}" placeholder="नयाँ वर्ष">
                                                @error('context')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Post Categories</label>

                                                <select class="form-control" name="category" required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ old('category',$category->name) == $post->category->name ? 'selected':'' }}>{{ $category->name }}</option>
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
                                                <input type="text" name="meta_tag" class="form-control" value="{{ old('meta_tag',$post->meta_tag) }}">
                                                @error('meta_tag')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <input type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword',$post->meta_keyword) }}">
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
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Youtube Link</label>
                                                <input type="url" name="youtube" class="form-control" value="{{ old('youtube',$post->youtube) }}">
                                                @error('youtube')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Image/Youtube Description</label>
                                                <input type="text" name="image_desc" class="form-control"
                                                    value="{{ old('image_desc',$post->image_desc) }}" >
                                                @error('image_desc')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @if (Auth::user()->userType == 'admin')
                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="exampleInputUsername1">Change Author</label>
                                            <select class="form-control" name="user_id" required>
                                            <option value="">Select</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user_id',$user->id == $post->user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @endif
                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="exampleInputUsername1">Trending No.*</label>
                                            <select class="form-control" name="trending_status" required>
                                                <option value="0">Hide</option>
                                                @for ($i=1;$i<=$trendingCount;$i++)
                                                <option value="{{ $i }}" {{ old('trending_status',$post->trending_status) == $i ? 'selected':'' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                            @error('trending_status')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @if($post->path)
                                            <div class="col-lg-4 col-md-12">
                                                <label class="f_text" for="current_image">Current Image</label>
                                                <img src="{{ Storage::url($post->path) }}" alt="{{ $post->title.' Image' }}" height="300" width="300">
                                            </div>
                                        @endif
                                        <div class="col-lg-12 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Post Description* (For advertisement write {Advertisement})</label>
                                                <textarea class="summernote"  name="description" required>{{ old('description',$post->description) }}</textarea>
                                                @error('description')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Update</button>
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
