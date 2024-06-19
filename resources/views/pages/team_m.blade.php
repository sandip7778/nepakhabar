@extends('layouts.newsLayout')
@section('title')
        NepaKhabar-Team
    @endsection

@section('content')

<div class="trending-area fix mt-150 mb-150">
    <div class="container">
        <div class="trending-main">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>हाम्राे टिम</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($teams as $team)
                                <div class="col-lg-4 mb-5">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30 ">
                                        <img src="{{ Storage::url($team->path) }}" class="zoom_in" alt="{{ $team->name }} image">
                                    </div>
                                    <div class="what-cap__">
                                        <span class="color1 Position_box">{{ Str::title($team->userType) }}</span>
                                        <h4 class="text_limit">{{ Str::title($team->name) }}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
