@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Posts </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Post Category </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Team Members </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Advertisment </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div class=""></div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Advertisment</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">


                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="assets/img/products/" alt="avatar">
                                <div class="media-body">
                                    <div class="float-right text-primary">Now</div>
                                    <div class="media-title">Title</div>
                                    <span class="text-small text-muted">.</span>
                                </div>
                            </li>


                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection