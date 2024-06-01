@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Posts</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Posts Data</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Views</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>pn5602</td>
                                        <td>First Blogs</td>
                                        <td>Latest News</td>
                                        <td>563</td>
                                        <td>60</td>
                                        <td><div class='badge badge-danger'>Dactive</div></td>
                                        <td>2024-05-6</td>
                                        <td>
                                            <a href=""><i class="fas fa-trash icon_box"></i></a>    
                                            <a href=""><i class="fas fa-pen icon_box "></i></a>
                                            <a href=""><i class="fas fa-eye icon_box "></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>pn5603</td>
                                        <td>Second Blogs</td>
                                        <td>Latest News</td>
                                        <td>563</td>
                                        <td>60</td>
                                        <td><div class='badge badge-success'>Active</div></td>
                                        <td>2024-05-6</td>
                                        <td>
                                            <a href=""><i class="fas fa-trash icon_box"></i></a>    
                                            <a href=""><i class="fas fa-pen icon_box m-1"></i></a>
                                            <a href=""><i class="fas fa-eye icon_box m-1"></i></a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
         
        </div>

    </section>
</div>
@endsection