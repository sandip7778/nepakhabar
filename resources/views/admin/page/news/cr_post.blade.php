@extends('admin/include/masterlayout')
@section('title')
Create News
@endsection
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Create</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></div>
                <div class="breadcrumb-item">News Create</div>
            </div>
        </div>

        <div class="section-body">
            <!-- <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

            <div class="row card">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="">
                        <div class="card-header">
                            <h4>News Post</h4>
                        </div>
                        <div class="card-body">
                            <form id="news_add" method="post" action="{{ route('posts.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Post Title*</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Sub-Title</label>
                                            <input type="text" name="sub_title" class="form-control"
                                                value="{{ old('sub_title') }}">
                                            @error('sub_title')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Context</label>
                                            <input type="text" name="context" class="form-control"
                                                value="{{ old('context') }}" placeholder="नयाँ वर्ष">
                                            @error('context')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Post Categories*</label>

                                            <select class="form-control" name="category" required>
                                                <option value="" selected>Select</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category') ? 'selected' : '' }}>{{ $category->name }}
                                                </option>
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
                                            <input type="text" name="meta_tag" class="form-control"
                                                value="{{ old('meta_tag') }}">
                                            @error('meta_tag')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <input type="text" name="meta_keyword" class="form-control"
                                                value="{{ old('meta_keyword') }}">
                                            @error('meta_keyword')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <label class="f_text" for="image">Images</label>
                                        <input type="file" name="image" class="form-control" value="{{ old('image') }}"
                                            accept=".png, .jpeg, .jpg, .gif, .svg">
                                        @error('image')
                                        <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Youtube Link</label>
                                            <input type="url" name="youtube" class="form-control"
                                                value="{{ old('youtube') }}">
                                            @error('youtube')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Image/Youtube Description</label>
                                            <input type="text" name="image_desc" class="form-control"
                                                value="{{ old('image_desc') }}">
                                            @error('image_desc')
                                            <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <label class="f_text" for="select status">Select Status*</label>
                                        <select class="form-control" name="status" value="{{ old('status') }}" required>
                                            <option value="1" >Active</option>
                                            <option value="0">Disable</option>
                                        </select>
                                        @error('status')
                                        <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <label class="f_text" for="exampleInputUsername1">Trending No.*</label>
                                        <select class="form-control" name="trending_status" value="{{ old('trending_status') }}"
                                            required>
                                            <option value="0">Hide</option>
                                            @for ($i=1;$i<=$trendingCount;$i++)
                                            <option value="{{ $i }}" {{ old('trending_status') ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @error('trending_status')
                                        <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Post Description*</label>
                                            <textarea class="summernote" name="description"
                                                 required>{{ old('description') }}</textarea>
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
