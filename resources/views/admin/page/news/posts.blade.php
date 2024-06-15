@extends('admin/include/masterlayout')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>News Posts</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Posts Data</h4>
                    </div>
                    @include('admin.shared.success')
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Likes</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->like }}</td>
                                        <td>60</td>
                                        <td>
                                            @if ( $post->status== 1)
                                            <div class='badge badge-success'>Active</div>
                                            @else
                                            <div class='badge badge-danger'>Inactive</div>
                                            @endif
                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('posts.changeStatus', $post->slug) }}"
                                                class="action_btn">
                                                @if ($post->status == true)
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
                                            <a href="{{ route('posts.edit', $post->slug) }}" class="action_btn"><i class="fas fa-pen icon_box "></i></a>
                                            <form class="pointer d-inline" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action_btn"><i class="fas fa-trash icon_box"></i></button>
                                            </form>
                                            <a href="{{ route('posts.show', $post->slug) }}" class="action_btn"><i class="fas fa-arrow-up icon_box "></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                   </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $posts->links() }}
                </div>
            </div>

        </div>

    </section>
</div>
@endsection
