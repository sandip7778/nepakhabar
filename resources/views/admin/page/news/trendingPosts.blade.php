@extends('admin/include/masterlayout')
@section('title')
    Trending News
@endsection
@section('content')

<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Trending Posts Data</h4>
                    </div>
                    @include('admin.shared.error')
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Trending No.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $index => $post)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td class="text_limit">{{ $post->title }}</td>
                                        <td>
                                            @foreach ($post->categories as $category)
                                                <li>{{ $category->name }},</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if ($post->trending_status == 0)
                                            <span class="text-danger">Hidden</span>
                                            @else
                                            {{ $post->trending_status }}
                                            @endif
                                        <td>
                                            @if ( $post->status== 1)
                                            <div class='badge badge-success'>Active</div>
                                            @else
                                            <div class='badge badge-danger'>Inactive</div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('posts.changeTrendingStatus', $post->slug) }}"
                                                class="action_btn">
                                                    <button type="button" class="action_btn" data-toggle="tooltip"
                                                        data-placement="bottom" title="Disable">
                                                        <span class="bg-danger px-2 rounded text-white">Hide</span>
                                                    </button>
                                                </a>
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
