@extends('admin/include/masterlayout')
@section('title')
    Add Video
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Add Video</h1>
                <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('videos.index') }}">Videos</a></div>
                        <div class="breadcrumb-item">Create Video</div>
                    </div>
            </div>

            <div class="section-body">
                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Video</h4>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <form id="video_create" method="post" action="{{ route('videos.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Video Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}" required>
                                                @error('title')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Video Category</label>
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
                                                <label>Youtube Link</label>
                                                <input type="url" name="url" class="form-control"
                                                    value="{{ old('url') }}" required>
                                                @error('url')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Video Description</label>
                                            <textarea class="summernote" name="description" value="" required maxlength="300">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger">Create</button>
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
