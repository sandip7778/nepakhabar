<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;



use App\Http\Controllers\commentController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\TeamMController;



// Route::get('/dashboard', function () {
//     return view('dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function (){
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class)->parameters(['posts'=>'slug']);
    Route::get('advertisements/{advertisement}/changeStatus', [AdvertisementController::class, 'changeStatus'])->name('advertisements.changeStatus');
    Route::resource('advertisements', AdvertisementController::class);
    Route::get('/dashboard', [DashboardController::class, 'index']) ->name('dashboard');
});

Route::get('/site_info', [DashboardController::class, 'site_info']) ->name('site_info');
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


require __DIR__.'/auth.php';
