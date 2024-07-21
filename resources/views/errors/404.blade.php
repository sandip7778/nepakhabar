@extends('layouts.newsLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">404 Not Found</div>
                <div class="card-body bg-danger">
                    <p class="text-white">Sorry, the page you are looking for could not be found.</p>
                    <form action="{{ url()->previous() ?: url('/') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-link bg-success text-white">Go Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
