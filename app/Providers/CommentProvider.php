<?php

namespace App\Providers;

use App\Repositories\CommentDAO;
use App\Interfaces\CommentInterface;
use Illuminate\Support\ServiceProvider;

class CommentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CommentInterface::class, CommentDAO::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
