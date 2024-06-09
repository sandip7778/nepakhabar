@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Posts </h4>
                            </div>
                            <div class="card-body">
                                <h6>Active : {{ $taPost }}</h6>
                                <h6 class="text-danger">Inactive : {{ $tdPost }}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-link"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Post Category </h4>
                            </div>
                            <div class="card-body">
                                <h6>{{ $totalCategory }}</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Team Members </h4>
                            </div>
                            <div class="card-body">
                                <h6>0</h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Advertisment </h4>
                            </div>
                            <div class="card-body">
                                <h6> Active : {{ $taAdvertisement }}</h6>
                                <h6 class="text-danger"> Inactive : {{ $tdAdvertisement }}</h6>

                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="dashboard.php?page=gallery">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Users </h4>
                            </div>
                            <div class="card-body">
                                <h4>0</h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>



        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @if ($posts->count())
                                @foreach ($posts as $post)
                                    @if ($post->status == 1)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                <form class="pointer d-inline"
                                                    action="{{ route('posts.destroy', $post->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action_btn"><i
                                                            class="fas fa-trash icon_box"></i></button>
                                                </form>
                                                <a href="{{ route('posts.edit', $post->slug) }}"
                                                    class="action_btn"><i class="fas fa-pen icon_box "></i></a>
                                                <a href="{{ route('posts.show', $post->slug) }}"
                                                    class="action_btn"><i class="fas fa-eye icon_box "></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @else
                                @if (request()->has('search'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        No posts found for the search term"{{ request()->input('search') }}".
                                        <button type="button" class="btn-close action_btn"
                                            data-bs-dismiss="alert" aria-label="Close">X</button>
                                    </div>
                                @else
                                    <tr>
                                        <td colspan="3">No posts available.</td>
                                    </tr>
                                @endif
                            @endif

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recent Advertisment</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border">
                            @foreach ($advertisements as $advertisement)
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="{{  Storage::url($advertisement->path) }}" alt="{{ $advertisement->name.' Image' }}">
                                <div class="media-body">
                                    <div class="float-right text-primary">{{ $advertisement->updated_at->format('Y-m-d') }}</div>
                                    <div class="media-title">{{ $advertisement->name }}</div>
                                    {{-- <span class="text-small text-muted">.</span> --}}
                                </div>
                            </li>
                            @endforeach


                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection
