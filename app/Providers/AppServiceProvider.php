<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\SiteRepositoryInterface',
            'App\Repositories\Eloquents\SiteRepository',
            'App\Repositories\Contracts\BookingRepositoryInterface',
            'App\Repositories\Eloquents\BookingRepository'
        );
    }
}
