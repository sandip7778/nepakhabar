@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Youtube Videos</h1>
                <div class="section-header-breadcrumb">
                    <a href="{{ route('videos.create') }}" class="btn btn-dark">
                        <i class="fas fa-plus"></i>
                        Add Video
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
                            <div class="card-header">
                                <h4>Video List</h4>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Title</th>
                                                <th>Video</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Uploaded Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($videos as $index => $video)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $video->title }}</td>
                                                    <td>
                                                        <div class="single-video">
                                                            <iframe src="{{ $video->url }}" frameborder="0"
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    </td>
                                                    <td>{{ $video->category->name }}</td>
                                                    <td>{{ $video->description }}</td>
                                                    <td>{{ $video->created_at }}</td>

                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <form class="pointer d-inline" action="{{ route('videos.destroy',$video->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="action_btn"><i
                                                                        class="fas fa-trash icon_box"></i></button>
                                                            </form>
                                                            <a href="{{ route('videos.edit', $video->id) }}" class="action_btn"><i class="fas fa-pen icon_box "></i></a>
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
                {{ $videos->links() }}
            </div>
        </section>
    </div>
@endsection
