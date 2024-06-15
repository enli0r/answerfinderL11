<?php

namespace App\Providers;

use App\Interfaces\PostInterface;
use App\Repositories\PostDAO;
use Illuminate\Support\ServiceProvider;

class PostProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $this->app->bind(PostInterface::class, PostDAO::class);
    }
}
