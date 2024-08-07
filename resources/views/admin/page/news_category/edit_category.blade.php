@extends('admin/include/masterlayout')
@section('title')
    Edit Category
@endsection
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Choose Position</label>
                                <select class="form-control" name="position" required >
                                    <option value="NULL" {{ old('position',$category->position)==null ? 'selected' : '' }}>None
                                    </option>
                                    <option value="1" {{ old('position',$category->position)==1 ? 'selected' : '' }}>Position 1
                                    </option>
                                    <option value="2" {{ old('position',$category->position)==2 ? 'selected' : '' }}>Position 2
                                    </option>
                                    <option value="3" {{ old('position',$category->position)==3 ? 'selected' : '' }}>Position 3
                                    </option>
                                    <option value="4" {{ old('position',$category->position)==4 ? 'selected' : '' }}>Position 4
                                    </option>
                                    <option value="5" {{ old('position',$category->position)==5 ? 'selected' : '' }}>Position 5
                                    </option>
                                    <option value="6" {{ old('position',$category->position)==6 ? 'selected' : '' }}>Position 6
                                    </option>
                                    <option value="7" {{ old('position',$category->position)==7 ? 'selected' : '' }}>Position 7
                                    </option>
                                    <option value="8" {{ old('position',$category->position)==8 ? 'selected' : '' }}>Position 8
                                    </option>
                                    <option value="9" {{ old('position',$category->position)==9 ? 'selected' : '' }}>Position 9
                                    </option>
                                    <option value="10" {{ old('position',$category->position)==10 ? 'selected' : '' }}>Position 10
                                    </option>
                                </select>
                                @error('position')
                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Show/Hide Header</label>
                                <select class="form-control" name="header_status" required>
                                    <option value="1"
                                        {{ old('header_status', $category->header_status) == true? 'selected' : '' }}>Show
                                    </option>
                                    <option value="0"
                                        {{ old('header_status', $category->header_status) == false ? 'selected' : '' }}>Hide
                                    </option>
                                </select>
                                @error('header_status')
                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Show/Hide Footer</label>
                                <select class="form-control" name="footer_status" required>
                                    <option value="1"
                                        {{ old('footer_status', $category->footer_status) == true ? 'selected' : '' }}>Show
                                    </option>
                                    <option value="0"
                                        {{ old('footer_status', $category->footer_status) == false ? 'selected' : '' }}>Hide
                                    </option>
                                </select>
                                @error('footer_status')
                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Block Design</label>
                                <select class="form-control" name="block" required>
                                    <option value="hide" {{ old('block', $category->block) == 0 ? 'selected' : '' }}>
                                        Hide</option>
                                    <option value="1" {{ old('block', $category->block) == 1 ? 'selected' : '' }}>
                                        Design 1</option>
                                    <option value="2" {{ old('block', $category->block) == 2 ? 'selected' : '' }}>
                                        Design 2</option>
                                    <option value="3" {{ old('block', $category->block) == 3 ? 'selected' : '' }}>
                                        Design 3</option>
                                </select>
                                @error('block')
                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('categories.index') }}"><button type="button" class="btn btn-warning"
                            data-bs-dismiss="modal">Cancel</button></a>
                    <button type="submit" class="btn btn-danger" id="add_member_btn">Edit Category</button>
                </div>
            </form>
        </section>
    </div>
@endsection
