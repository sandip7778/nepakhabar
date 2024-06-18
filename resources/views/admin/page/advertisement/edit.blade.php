@extends('admin/include/masterlayout')
@section('title')
    Edit Advertisement
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advertisement Edit</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Post</a></div>
                    <div class="breadcrumb-item">Advertisement Edit</div>
                </div>
            </div>

            <div class="section-body">
                <!-- <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Advertisements</h4>
                                @if ($errors->any())
                                <div>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </div>
                            <div class="card-body">
                                <form id="advertisement_add" method="post" action="{{ route('advertisements.update',$advertisement->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="c_name" class="form-control" value="{{ old('c_name',$advertisement->name) }}" required>
                                                @error('c_name')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <select class="form-control" name="position" required>
                                                    <option value="" selected>Select Position</option>
                                                        <option value="header" {{ old('position',$advertisement->position) == 'header' ? 'selected' : '' }}>Header</option>
                                                        <option value="center1" {{ old('position',$advertisement->position) == 'center1' ? 'selected' : '' }}>Center 1</option>
                                                        <option value="center2" {{ old('position',$advertisement->position) == 'center2' ? 'selected' : '' }}>Center 2</option>
                                                        <option value="center3" {{ old('position',$advertisement->position) == 'center3' ? 'selected' : '' }}>Center 3</option>
                                                        <option value="sidebar1" {{ old('position',$advertisement->position) == 'sidebar1' ? 'selected' : '' }}>Sidebar 1</option>
                                                        <option value="sidebar2" {{ old('position',$advertisement->position) == 'sidebar2' ? 'selected' : '' }}>Sidebar 2</option>
                                                        <option value="sidebar3" {{ old('position',$advertisement->position) == 'sidebar3' ? 'selected' : '' }}>Sidebar 3</option>
                                                        <option value="sidebar4" {{ old('position',$advertisement->position) == 'sidebar4' ? 'selected' : '' }}>Sidebar 4</option>
                                                        <option value="footer" {{ old('position',$advertisement->position) == 'footer' ? 'selected' : '' }}>Footer</option>
                                                </select>
                                                @error('position')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="ad_image">Images</label>
                                            <input type="file" name="ad_image" class="form-control"  accept=".png, .jpeg, .jpg, .gif, .svg" >
                                            @error('ad_image')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Goto Link</label>
                                                <input type="url"  name="url" class="form-control" value="{{ old('url',$advertisement->description) }}" required></input>
                                                @error('url')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="date"  name="expiry_date" value="{{ old('expiry_date',$advertisement->expiry_date) }}" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required></input>
                                                @error('expiry_date')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @if($advertisement->ad_path)
                                            <div class="col-lg-4 col-md-12">
                                                <label class="f_text" for="current_image">Current Image</label>
                                                <img src="{{ Storage::url($advertisement->ad_path) }}" alt="{{ $advertisement->name.' Image' }}" height="300" width="300">
                                            </div>
                                        @endif

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
