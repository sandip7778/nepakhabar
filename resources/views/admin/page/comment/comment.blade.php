@extends('admin/include/masterlayout')
@section('title')
    Manage Comments
@endsection
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Comments</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}" >Dashboard</a></div>
                    <div class="breadcrumb-item">comments</div>
                </div>
            </div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @include('admin.shared.success')
                            @error('name')
                                <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                            @enderror
                            <div class="card-header">
                                <h4>All Comments</h4>
                                <div class="card-header-form">
                                    <!-- <form>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Search">
                                                                    <div class="input-group-btn">
                                                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                                    </div>
                                                                </div>
                                                            </form> -->
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>User</th>
                                                <th>Post</th>
                                                <th>Comment</th>
                                                <th>Updated Date</th>
                                                <th>Last Reply</th>
                                                <th>Reply</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($comments as $index => $comment)
                                                @if (!$comment->parent_id)
                                                    @include('admin.shared.success')
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $comment->user->name }}</td>
                                                        <td>{{ $comment->post->title }}</td>
                                                        <td>{{ $comment->content }}</td>
                                                        @if ($comment->reply)
                                                            <td>{{ $comment->reply->created_at }}</td>
                                                            <td>{{ $comment->reply->content }}</td>
                                                        @else
                                                            <td></td>
                                                            <td>No reply found</td>
                                                        @endif
                                                        <td>
                                                            <div class="reply-btn">
                                                                <form
                                                                    action="{{ route('posts.comments.store', $comment->post->slug) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="post_id" 
                                                                        value="{{ $comment->post->id }}">
                                                                    <input type="hidden" name="parent_id"
                                                                        value="{{ $comment->id }}">
                                                                    <textarea name="content" class="form-control" required ></textarea>
                                                                    <button type="submit"
                                                                    class="btn btn-danger mt-2 mb-2">Reply</button>
                                                                </form>
                                                                {{-- <a href="#" class="btn-reply text-uppercase">reply</a> --}}
                                                            </div>
                                                        </td>
                                                        <td class="d-flex justify-content-center align-items-center">
                                                            <form class="pointer d-inline"
                                                                action="{{ route('comments.destroy', $comment->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="action_btn"><i
                                                                        class="fas fa-trash icon_box"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
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
