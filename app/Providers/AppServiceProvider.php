<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Category;
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
        Paginator::useBootstrapFive();
        $categories = Category::where('id', '!=', 1)->orderBy('updated_at', 'ASC')->get();
        $other = Category::find(1);

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
        View::share('other', $other);
        View::share('advertisements',$advertisements);

    }
}
