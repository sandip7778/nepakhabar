<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NewsPageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\TrandinController;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified','role:admin|editor|reporter'])->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');
    Route::get('posts/{slug}/changeTrendingStatus', [PostController::class, 'changeTrendingStatus'])->name('posts.changeTrendingStatus');
    Route::get('posts/trendingPosts', [PostController::class, 'trendingPosts'])->name('posts.trendingPosts');
    Route::get('posts/{slug}/changeStatus', [PostController::class, 'changeStatus'])->name('posts.changeStatus');
    Route::resource('posts', PostController::class)->parameters(['posts' => 'slug'])->except('show');
    Route::get('advertisements/{advertisement}/changeStatus', [AdvertisementController::class, 'changeStatus'])->name('advertisements.changeStatus');
    Route::get('advertisements/createWithCategory', [AdvertisementController::class, 'createWithCategory'])->name('advertisements.createWithCategory');
    Route::resource('advertisements', AdvertisementController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/comments',[CommentController::class, 'comments'])->name('comments');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('users/{user}/changeStatus', [UserController::class, 'changeStatus'])->name('users.changeStatus');
        Route::resource('/users', UserController::class);
        Route::get('guests/{guest}/changeStatus', [GuestController::class, 'changeStatus'])->name('guests.changeStatus');
        Route::resource('/guests', GuestController::class);
        Route::resource('/site',SiteController::class)->only('show','update');
        Route::resource('/tranding',TrandinController::class)->only('show','update');
        Route::resource('/videos',VideoController::class);
    });
});

//  maintenance auth start
Route::controller(NewsPageController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/teams','team')->name('team');
    Route::get('/contact-us','contactUs')->name('contactus');
});

Route::resource('categories', CategoryController::class)->only('show');
Route::resource('posts', PostController::class)->parameters(['posts' => 'slug'])->only('show');
Route::get('posts/{post}/share/{network}',[NewsPageController::class,'share'])->name('posts.share');

//  maintenance auth end

Route::middleware('auth')->group(function(){
    Route::resource('posts.comments',CommentController::class)->shallow();
    Route::post('posts/{post}/like',[LikeController::class,'like'])->name('posts.like');
    Route::post('posts/{post}/unlike',[LikeController::class,'unlike'])->name('posts.unlike');
});

require __DIR__ . '/auth.php';
