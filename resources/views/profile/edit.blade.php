@extends('admin/include/masterlayout')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
            </div>
            <div class="container py-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Update Profile Information</h5>
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Update Password</h5>
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Delete User</h5>
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
