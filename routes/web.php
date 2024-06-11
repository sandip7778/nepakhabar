<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserType;
use App\Http\Controllers\GuestController;



use App\Http\Controllers\commentController;
use App\Http\Controllers\NewShow;
use App\Http\Controllers\NewsPageController;
use App\Models\Post;

// Route::get('/', function () {
//     $posts = Post::orderBy('updated_at', 'desc')->paginate(10);
//         return view('welcome', compact('posts'));

// })->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified','role:admin|editor|reporter'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class)->parameters(['posts' => 'slug']);
    Route::get('advertisements/{advertisement}/changeStatus', [AdvertisementController::class, 'changeStatus'])->name('advertisements.changeStatus');
    Route::resource('advertisements', AdvertisementController::class);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('users/{user}/changeStatus', [UserController::class, 'changeStatus'])->name('users.changeStatus');
        Route::resource('/users', UserController::class);
        Route::get('guests/{guest}/changeStatus', [GuestController::class, 'changeStatus'])->name('guests.changeStatus');
        Route::resource('/guests', GuestController::class);
        Route::get('/site_info', [DashboardController::class, 'site_info'])->name('site_info');
    });
});



Route::resource('comments', commentController::class);


// Route::controller(NewShow::class)->group(function () {
//     Route::get('/', 'indexN')->name('indexN');
//     Route::get('/content/{id}', 'Categories')->name('content');
//     Route::get('/news', 'NewShow')->name('news');
//     Route::get('/Team_member', 'TeamMemeber')->name('team_member');
//     Route::get('/post/{id}', 'SingleNews')->name('post');
// });

Route::controller(NewsPageController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/showNews/{slug}','showNews')->name('showNews');

});



require __DIR__ . '/auth.php';
