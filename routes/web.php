<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home');
});

Route::get('/categories', function () {
    return view('admin.page.news_cate.category');
});
Route::get('/posts', function () {
    return view('admin.page.news.posts');
});

Route::get('/create_post', function () {
    return view('admin.page.news.cr_post');
});