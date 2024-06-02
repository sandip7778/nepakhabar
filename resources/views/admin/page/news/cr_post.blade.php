
@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Create</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Post</a></div>
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
                            <form id="news_add" method="post" action="{{ route('posts.create') }}">
                                @csrf
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
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Post Categories</label>
                                            <select class="form-control" name="new_category">
                                                <option value="c">Select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Meta Tag</label>
                                            <input type="text" name="meta_tag" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="form-group">
                                            <label>Meta Keyword</label>
                                            <input type="text" name="meta_keword" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <label class="f_text" for="exampleInputUsername1">Images</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <label class="f_text" for="exampleInputUsername1">Select Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">IN Active</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mt-3">
                                        <div class="form-group">
                                            <label>Post Description</label>
                                            <textarea class="summernote" name="description"></textarea>
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
