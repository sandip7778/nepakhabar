<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewShow;
use App\Http\Controllers\commentController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\TeamMController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');
Route::get('/site_info', [DashboardController::class, 'site_info']) ->name('site_info');
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class)->parameters(['posts'=>'slug']);
Route::resource('comments', commentController::class);
Route::resource('advertisments', AdvertismentController::class);
Route::resource('teamsmember', TeamMController::class);


Route::controller(NewShow::class)->group(function(){
    Route::get('/','indexN')->name('indexN');
    Route::get('/content/{id}','Categories')->name('content');
    Route::get('/news','NewShow')->name('news');
    Route::get('/Team_member','TeamMemeber')->name('team_member');
    Route::get('/post/{id}','SingleNews')->name('post');
});

