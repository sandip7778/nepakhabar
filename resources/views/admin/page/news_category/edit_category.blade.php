@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit News Category</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">*</button> -->
                <i class="mdi mdi-close-circle" data-bs-dismiss="modal" aria-label="Close"></i>
            </div>
            <form method="post" id="edit_category" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="f_text" for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="name" id="category_name"
                                value="{{ $category->name }}" required>
                                @error('name')
                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('categories.index') }}"><button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-danger" id="add_member_btn">Edit Category</button>
                </div>
            </form>
        </section>
    </div>
@endsection
