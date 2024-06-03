<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewShow;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');

Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class)->parameters(['posts'=>'slug']);


Route::controller(NewShow::class)->group(function(){
    Route::get('/menu','Categories')->name('menu');
    Route::get('/news','NewShow')->name('news');
    Route::get('/post/{id}','SingleNews')->name('post');
});
