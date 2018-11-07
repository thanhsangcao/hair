<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'site' => [
            App\Repositories\Contracts\SiteRepositoryInterface::class,
            App\Repositories\Eloquents\SiteRepository::class,
        ],
        'booking' => [
            App\Repositories\Contracts\BookingRepositoryInterface::class,
            App\Repositories\Eloquents\BookingRepository::class,
        ],
    ];
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->singleton(
                $repository[0],
                $repository[1]
            );
        }
    }
}