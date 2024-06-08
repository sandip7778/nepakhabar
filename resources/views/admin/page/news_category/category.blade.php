@extends('admin/include/masterlayout')

@section('content')
    <div class="modal fade" id="addcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add News Category</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button> -->
                    <i class="mdi mdi-close-circle" data-bs-dismiss="modal" aria-label="Close"></i>
                </div>
                <form method="post" id="add_category" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row ">
                            <div class="col-md-6">
                                <label class="f_text" for="category_name">Category Name</label>
                                <input type="text" class="form-control" name="name" id="category-name"
                                    placeholder="Name.." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="add_member_btn">Add Category</button>
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
                    <a href="#" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addcategory">
                        <i class="fas fa-plus"></i>
                        Add Category
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
                                                <th>Name</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $key => $category)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->updated_at }}</td>
                                                    <td>
                                                        <form class="pointer d-inline" action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="action_btn"><i class="fas fa-trash icon_box"></i></button>
                                                        </form>
                                                        <button class="action_btn" ><a href="{{ route('categories.edit', $category->id) }}" ><i class="fas fa-pen icon_box "></i></a></button>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
