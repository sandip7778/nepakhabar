<?php

namespace App\Providers;

use App\Http\Middleware\CheckUserType;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Route::bind('slug', function ($value) {
        //     return Post::where('slug', $value)->firstOrFail();
        // });
        Route::aliasMiddleware('role',CheckUserType::class);
    }
}
