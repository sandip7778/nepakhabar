<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;








Route::get('/', function () {
    return view('welcome');
});

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


require __DIR__.'/auth.php';
