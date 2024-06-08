@extends('admin/include/masterlayout')

@section('content')
    <div class="modal fade" id="addComment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add News Comments</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button> -->
                    <i class="mdi mdi-close-circle" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <form method="post" id="add_category" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="f_text" for="category_name"> Name</label>
                                <input type="text" class="form-control" name="name" id="category-name"
                                    placeholder="Name.." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="add_member_btn">Add Comments</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Comments</h1>
                <div class="section-header-breadcrumb">
                    <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addComment">
                        <i class="fas fa-plus"></i>
                        Add Comments
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
                            @include('admin.shared.success')
                            @error('name')
                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                            @enderror
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
                                                <th>User</th>
                                                <th>Post</th>
                                                <th>Comment</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                <tr>
                                               
                                                    <td>1</td>
                                                    <td>Sandip </td>
                                                    <td>News4554</td>
                                                    <td>Comments</td>
                                                    <td>2024-06-06</td>
                                                    <td>
                                                        <form class="pointer d-inline" action="" method="POST">
                                                            <!-- @csrf
                                                            @method('DELETE') -->
                                                            <button type="submit" class="action_btn"><i class="fas fa-trash icon_box"></i></button>
                                                        </form>
                                                        <button class="action_btn" ><a href="" ><i class="fas fa-pen icon_box "></i></a></button>
                                                    </td>
                                                </tr>
                                        

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                  
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
