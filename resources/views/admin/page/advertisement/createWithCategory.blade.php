@extends('admin/include/masterlayout')
@section('title')
    Advertisement with Category
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Advertisement with Category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('advertisements.index') }}">Advertisements</a></div>
                    <div class="breadcrumb-item">Create Advertisement with Category </div>
                </div>
            </div>

            <div class="section-body">
                <!-- <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Advertisements with Category </h4>
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
                                <form id="advertisement_add" method="post" action="{{ route('advertisements.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" name="c_name" class="form-control" value="{{ old('c_name') }}" required>
                                                @error('c_name')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Position</label>
                                                <select class="form-control" name="position" required>
                                                    <option selected disabled hidden>Select Position</option>
                                                    <option value="sidebar1" >Category- Sidebar 1</option>
                                                    <option value="sidebar2" >Category- Sidebar 2</option>
                                                    <option value="sidebar3" >Category- Sidebar 3</option>
                                                    <option value="sidebar4" >Category- Sidebar 4</option>
                                                </select>
                                                @error('position')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Advertisement Category</label>

                                                <select class="form-control" name="category" required>
                                                    <option value="" selected disabled hidden>Select Category</option>
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
                                            <label class="f_text" for="ad_image">Images</label>
                                            <input type="file" name="ad_image" class="form-control"  accept=".png, .jpeg, .jpg, .gif, .svg" required>
                                            @error('ad_image')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Goto Link</label>
                                                <input type="url"  name="url" class="form-control" value="{{ old('url') }}" required></input>
                                                @error('url')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12 mt-3">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="date"  name="expiry_date" value="{{ old('expiry_date') }}" class="form-control" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required></input>
                                                @error('expiry_date')
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
