@extends('admin/include/masterlayout')
@section('title')
    Manage Site
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tranding Post Count </h1>
            </div>

            <div class="section-body">
                <div class="row card">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="">
                            <div class="card-header">
                                <h4>Tranding Post count</h4>
                            </div>
                            @include('admin.shared.success')
                            <div class="card-body">

                                <form id="site_edit" method="post"  action="{{ route('tranding.update',1) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Tranding show Count</label>
                                                <input type="number" name="count_tranding" class="form-control" value="{{ $tranding->count_tranding }}" required>
                                                @error('siteName')
                                                    <span class="d-block mt-2 fs-6 text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection
