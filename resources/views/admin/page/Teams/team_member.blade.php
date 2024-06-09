@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Members</h1>
                <div class="section-header-breadcrumb">
                    <a href="#" class="btn btn-dark">
                        <i class="fas fa-plus"></i>
                        Add Members
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
                                <h4>Member List</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Images</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Updated Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Jhon </td>
                                                    <td>img</td>
                                                    <td>jhon@gmail.com</td>
                                                    <td>L</td>
                                                    <td>Active</td>
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
