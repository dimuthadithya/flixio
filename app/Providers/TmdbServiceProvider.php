<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TmdbService;

class TmdbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(TmdbService::class, function ($app) {
            return new TmdbService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
