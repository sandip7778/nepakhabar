<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

Route::resource('categories', CategoryController::class);

// Route::get('/categories', function () {
//     return view('admin.page.news_cate.category');
// });
Route::get('/posts', function () {
    return view('admin.page.news.posts');
});

Route::get('/create_post', function () {
    return view('admin.page.news.cr_post');
});
