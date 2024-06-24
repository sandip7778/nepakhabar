<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Site;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $threeDay = Carbon::now()->subDays(3);
        Paginator::useBootstrapFive();
        $categories = Category::orderBy('position','ASC')->get();
        $latestpost = Post::where('created_at','>=',$threeDay)->inRandomOrder()->limit(6)->get();
        $site = Site::find(1);

        // advertisements catching
        $uniquePositions = Advertisement::where('status', true)->distinct()->pluck('position')->toArray();
        $advertisements = collect();
        foreach ($uniquePositions as $position) {
            $advertisement = Advertisement::where('status', true)
                ->where('position', $position)
                ->inRandomOrder()
                ->first();
            if ($advertisement) {
                $advertisements->push($advertisement);
            }
        }

        View::share('categories', $categories);
        View::share('site', $site);
        View::share('advertisements',$advertisements);
        View::share('latestpost',$latestpost);

    }
}
