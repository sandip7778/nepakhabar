<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewShow;


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

Route::controller(NewShow::class)->group(function(){
    Route::get('/menu','Categories')->name('menu');
    Route::get('/news','NewShow')->name('news');
    Route::get('/post/{id}','SingleNews')->name('post');
});
