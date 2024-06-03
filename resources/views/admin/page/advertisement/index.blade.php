@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Advertisements</h1>
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
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($advertisements as $index => $advertisement)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $advertisement->name }}</td>
                                        <td>{{ $advertisement->description }}</td>
                                        <td>{{ $advertisement->ad_path }}</td>
                                        <td>
                                            @if ( $advertisement->status== true)
                                            <div class='badge badge-success'>Active</div>
                                            @else
                                            <div class='badge badge-danger'>Dactive</div>
                                            @endif
                                        </td>
                                        <td>{{ $advertisement->created_at }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form class="pointer d-inline" action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action_btn"><i class="fas fa-trash icon_box"></i></button>
                                            </form>
                                            <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="action_btn"><i class="fas fa-pen icon_box "></i></a>
                                            <a href="{{ route('advertisements.show', $advertisement->id) }}" class="action_btn"><i class="fas fa-eye icon_box "></i></a>
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
