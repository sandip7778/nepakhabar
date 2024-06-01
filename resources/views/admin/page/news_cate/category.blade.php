@extends('admin/include/masterlayout')

@section('content')

<div class="modal fade" id="adddevice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add News Categories</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button> -->
                <i class="mdi mdi-close-circle" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form method="post" id="add_category">
                <div class="modal-body">
                    <div class="row ">

                        <div class="col-md-6">
                            <label class="f_text" for="exampleInputUsername1">Categoriew Title</label>
                            <input type="text" class="form-control" name="title" id="exampleInputUsername1"
                                placeholder="Title" required>
                        </div>
                        <div class="col-md-6">
                            <label class="f_text" for="exampleInputUsername1">Select Status</label>
                            <select class="form-control" name="status">
                                <option value="1" selected>Active</option>
                                <option value="0">IN Active</option>

                            </select>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="add_member_btn">Add Gallery</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Categories</h1>
            <div class="section-header-breadcrumb">
                <a href="#" class="btn btn-dar">
                    <select class="form-control" name="new_category">
                        <option value="c">Select</option>
                    </select>
                </a>
                <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#adddevice">
                    <i class="fas fa-plus"></i>
                    Add Categories
                </a>

                <!-- <div class="breadcrumb-item active"><a href="#" class="p_color">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#" class="p_color">slider</a></div>
                <div class="breadcrumb-item">sliders</div> -->
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Categories Data</h4>
                            <div class="card-header-form">
                                <!-- <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>pn5602</td>
                                            <td>First Blogs</td>
                                            <td>
                                                <div class='badge badge-danger'>Dactive</div>
                                            </td>
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
                                            <td>
                                                <div class='badge badge-success'>Active</div>
                                            </td>
                                            <td>2024-05-6</td>
                                            <td>
                                                <a href=""><i class="fas fa-trash icon_box"></i></a>
                                                <a href=""><i class="fas fa-pen icon_box"></i></a>
                                                <a href=""><i class="fas fa-eye icon_box"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i
                                                class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection