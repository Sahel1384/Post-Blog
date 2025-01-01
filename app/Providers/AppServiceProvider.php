<?php

namespace App\Providers;

// use Illuminate\Pagination\Paginator;

use App\Models\Post;
use App\Observers\PostObserver;
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
        // Paginator::useBootstrapFive();

        // Post::observe(PostObserver::class);
    }
}
