<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;


use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Builder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Builder::defaultStringLength(191);
    }
}
