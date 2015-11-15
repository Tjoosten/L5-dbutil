<?php

namespace Tjoosten\Dbutil;

use Illuminate\Support\ServiceProvider;
use Tjoosten\Dbutil\Controllers\DbutilController;

class DbUtilServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap any application.
     *
     * @return void
     */
    public function boot()
    {
        // Upload and set the migrations.
        $this->publishes([
            __DIR__ . '/../../migrations/' => base_path('/database/migrations')
        ], 'migrations');

        // Upload the database seed.
        $this->publishes([
            __DIR__ . '/../../seeds/' => base_path('/database/seeds')
        ], 'seed');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the controllers.
        $this->app->make('Tjoosten\Dbutil\Controllers\DbutilController');
        // Register 'permissions' instance container to out Permissions object.
        $this->app['permissions'] = $this->app->share(function($app)
        {
            return new DbutilController();
        });
    }
}

