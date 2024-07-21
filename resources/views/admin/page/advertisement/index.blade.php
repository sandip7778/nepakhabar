@extends('admin/include/masterlayout')
@section('title')
    Advertisements
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advertisements</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('advertisements.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i>
                        Add Advertisement
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Advertisements Data</h4>
                        </div>
                        @include('admin.shared.success')
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Category</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Create Date</th>
                                            <th>Expiry Date</th>
                                            <th>Action</th>
                                            <th>Image</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($advertisements as $index => $advertisement)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $advertisement->name }}</td>
                                                <td class="text_limit">{{ $advertisement->url }}</td>
                                                <td>{{ $advertisement->category?$advertisement->category->name:'Not Assigned' }}</td>
                                                <td>{{ $advertisement->position }}</td>

                                                <td>
                                                    @if ($advertisement->status == true)
                                                        <div class='badge badge-success'>Active</div>
                                                    @else
                                                        <div class='badge badge-danger'>Expired</div>
                                                    @endif
                                                </td>
                                                <td>{{ $advertisement->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $advertisement->expiry_date }}</td>

                                                <td class="d-flex justify-content-center align-items-center">

                                                    <a href="{{ route('advertisements.changeStatus', $advertisement->id) }}"
                                                        class="action_btn">
                                                        @if ($advertisement->status == 1)
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


                                                    <a href="{{ route('advertisements.edit', $advertisement->id) }}"
                                                        class="action_btn" data-toggle="tooltip" data-placement="bottom"
                                                        title="Edit"><i class="fas fa-pen icon_box "></i></a>
                                                    <form class="pointer d-inline"
                                                        action="{{ route('advertisements.destroy', $advertisement->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action_btn" data-toggle="tooltip"
                                                            data-placement="bottom" title="Permanently delete">
                                                            <i class="fas fa-trash icon_box"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                                <td><img src="{{ Storage::url($advertisement->ad_path) }}"
                                                    alt="{{ $advertisement->name . ' Image' }}" height="50px">
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $advertisements->links() }}
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
