<?php

namespace App\Providers;

use App\Repositories\UserImageDAO;
use App\Interfaces\UserImageInterface;
use Illuminate\Support\ServiceProvider;

class UserImageProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserImageInterface::class, UserImageDAO::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
