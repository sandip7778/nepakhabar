@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Members</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('users.create') }}" class="btn btn-dark">
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
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td><img src="{{ Storage::url($user->path) }}"
                                                        alt="{{ $user->name . ' Image' }}" height="100px"></td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->userType }}</td>
                                                    <td> @if ($user->status ===1)
                                                        Active
                                                        @elseif ($user->status === 0)
                                                        <span class="text-danger">Inactive</span>
                                                    @endif</td>
                                                    <td>{{ $user->created_at }}</td>

                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <a href="{{ route('users.changeStatus', $user->id) }}"
                                                                class="action_btn">
                                                                @if ($user->status == true)
                                                                    <button type="button" class="action_btn" data-toggle="tooltip"
                                                                        data-placement="bottom" title="Disable">
                                                                        <i class="fas fa-eye-slash icon_box"></i>
                                                                    </button>
                                                                @else
                                                                    <button type="button" class="action_btn" data-toggle="tooltip"
                                                                        data-placement="bottom" title="Enable">
                                                                        <i class="fas fa-eye icon_box"></i>
                                                                    </button>
                                                                @endif
                                                            </a>

                                                            <a href="{{ route('users.edit', $user->id) }}" class="action_btn"><i class="fas fa-pen icon_box "></i></a>
                                                        </td>

                                                </tr>
                                                @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{ $users->links() }}
            </div>
        </section>
    </div>
@endsection
