@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Site Information</h1>
                <!-- <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Post</a></div>
                    <div class="breadcrumb-item">News Edit</div>
                </div> -->
            </div>

            <div class="section-body">
                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Site Info</h4>
                            </div>
                            <div class="card-body">

                                <form id="site_edit" method="post"  action="{{ route('site.update',1) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <input type="text" name="siteName" class="form-control" value="{{ $site->siteName }}" required>
                                                @error('siteName')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control" value="{{ $site->address }}" required>
                                                @error('address')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $site->email }}" required>
                                                @error('email')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Phone No</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $site->phone }}" required>
                                                @error('phone')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Facebook Link</label>
                                                <input type="url" name="facebook" class="form-control" value="{{ $site->facebook }}" >
                                                @error('facebook')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Instagram Link</label>
                                                <input type="url" name="instagram" class="form-control" value="{{ $site->instagram }}" >
                                                @error('instagram')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Twitter Link</label>
                                                <input type="url" name="twitter" class="form-control" value="{{ $site->twitter }}" >
                                                @error('twitter')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Youtube Link</label>
                                                <input type="url" name="youtube" class="form-control" value="{{ $site->youtube }}" >
                                                @error('youtube')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Thread Link</label>
                                                <input type="url" name="thread" class="form-control" value="{{ $site->thread }}" >
                                                @error('thread')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <input type="text" name="metaTitle" class="form-control" value="{{ $site->metaTitle }}" >
                                                @error('metaTitle')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Tag</label>
                                                <input type="text" name="metaTag" class="form-control" value="{{ $site->metaTag }}" >
                                                @error('metaTag')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <input type="text" name="metaKeyword" class="form-control" value="{{ $site->metaKeyword }}" >
                                                @error('metaKeyword')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <textarea class="form-control" name="metaDescription" >{{ $site->metaDescription }}</textarea>
                                                @error('metaDescription')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Save</button>
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
