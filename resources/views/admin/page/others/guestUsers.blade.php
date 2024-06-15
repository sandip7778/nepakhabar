@extends('admin/include/masterlayout')
@section('title')
    Manage Users
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Guest Users</h1>
                <div class="section-header-breadcrumb">

                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Guest Users</div>
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
                                <h4>Guest User List</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Joined Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($guests as $index => $guest)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $guest->name }}</td>
                                                    <td>{{ $guest->email }}</td>
                                                    <td> @if ($guest->status ===1)
                                                        Active
                                                        @elseif ($guest->status === 0)
                                                        <span class="text-danger">Inactive</span>
                                                    @endif</td>
                                                    <td>{{ $guest->created_at->format('d-M-Y') }}</td>

                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <a href="{{ route('guests.changeStatus', $guest->id) }}"
                                                                class="action_btn">
                                                                @if ($guest->status == true)
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

                                                            {{-- <a href="{{ route('guests.edit', $guest->id) }}" class="action_btn"><i class="fas fa-pen icon_box "></i></a> --}}
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
                {{ $guests->links() }}
            </div>
        </section>
    </div>
@endsection
