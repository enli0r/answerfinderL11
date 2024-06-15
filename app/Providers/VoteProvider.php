<?php

namespace App\Providers;

use App\Repositories\VoteDAO;
use App\Interfaces\VoteInterface;
use Illuminate\Support\ServiceProvider;

class VoteProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(VoteInterface::class, VoteDAO::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
