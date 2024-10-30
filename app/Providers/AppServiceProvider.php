<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
   public function register()
{
    app('router')->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        app('router')->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
    }
}
