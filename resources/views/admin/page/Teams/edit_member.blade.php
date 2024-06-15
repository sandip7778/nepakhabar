@extends('admin/include/masterlayout')
@section('title')
    Edit Member
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Team Member</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Members</a></div>
                    <div class="breadcrumb-item">Edit Member</div>
                </div>
            </div>

            <div class="section-body">
                <!-- <h2 class="section-title">Advanced Forms</h2>
                <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p> -->

                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Edit Member</h4>
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
                                <form method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required autofocus>
                                                @error('name')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                                @error('email')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="userType">User Type</label>
                                            <select class="form-control" name="userType" required>
                                                <option value="editor" {{ $user->userType=='editor'?'selected':'' }}>Editor</option>
                                                <option value="reporter" {{ $user->userType=='reporter'?'selected':'' }}>Reporter</option>
                                                <option value="admin" {{ $user->userType=='admin'?'selected':'' }}>Admin</option>
                                            </select>
                                            @error('userType')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <label class="f_text" for="image">Images</label>
                                            <input type="file" name="image" class="form-control" accept=".png, .jpeg, .jpg" >
                                            @error('image')
                                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-12 col-md-12 mt-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-success">Update</button>
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
