<?php

namespace MpgsLaravel;

use Illuminate\Support\ServiceProvider;

class MpgsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mpgs.php', 'mpgs');
        $this->app->singleton('mpgs', function ($app) {
            return new Mpgs(
                config('mpgs.api_url'),
                config('mpgs.merchant_id'),
                config('mpgs.api_username'),
                config('mpgs.api_password'),
            );
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/mpgs.php' => config_path('mpgs.php'),
        ]);
    }
}