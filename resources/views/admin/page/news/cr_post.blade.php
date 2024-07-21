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
                        <div class="card-body" id="add_pro_forom">
                            <form id="news_add" method="post" action="{{ route('posts.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <!-- Left Side Section  -->
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Post Title</label>
                                                <textarea name="" id="" name="title" class="form-control"
                                                value="{{ old('title') }}" required ></textarea>
                                                @error('title')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Post Sub Title</label>
                                                <textarea name="" id="" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Post Description</label>
                                                <textarea class="summernote" name="description"
                                                    value="{{ old('description') }}" required></textarea>
                                                @error('description')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Right Side Section  -->
                                    <div class="col-lg-4 col-md-12">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Post Categories</label>
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
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="f_text" for="exampleInputUsername1">Select Status</label>
                                                <select class="form-control" name="status" value="{{ old('status') }}"
                                                    required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                                @error('status')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label class="f_text" for="exampleInputUsername1">Is Tranding</label>
                                                <select class="form-control" name="trending_status"
                                                    value="{{ old('trending_status') }}" required>
                                                    <option value="0">No</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                @error('status')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <p>News Primary Image (Mix 2MB)</p>
                                            <div class="form-group add_product_img_box">
                                                <label class="f_text" for="file-input">Select Image</label>
                                                <input type="file" name="image" id="file-input" class="form-control" onchange="preview()"
                                                    value="{{ old('image') }}" accept=".png, .jpeg, .jpg, .gif, .svg">
                                                @error('image')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="im_box ml-3" id="images">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Youtube Link</label>
                                                <input type="url" name="youtube" class="form-control"
                                                    value="{{ old('youtube') }}">
                                                @error('youtube')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <h4>New SEO Section</h4>    -->
                                    <div class="col-lg-8 col-md-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Meta Keyword</label>
                                                    <input type="text" name="meta_keyword" class="form-control"
                                                        value="{{ old('meta_keyword') }}">
                                                    @error('meta_keyword')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <label>Meta Tag</label>
                                                    <input type="text" name="meta_tag" class="form-control"
                                                        value="{{ old('meta_tag') }}">
                                                    @error('meta_tag')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
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