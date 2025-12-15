<?php

namespace Avexsoft\FilamentDonkey;

use Illuminate\Support\ServiceProvider;

class FilamentDonkeyServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'avexsoft');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'avexsoft');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        view()->addLocation(__DIR__.'/../resources/views');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

    }

    /**
     * Register any package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/filament-donkey.php', 'filament-donkey');

        // Register the service the package provides.
        $this->app->singleton('filament-donkey', function ($app) {
            return new FilamentDonkey;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['filament-donkey'];
    }

    /**
     * Console-specific booting.
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/filament-donkey.php' => config_path('filament-donkey.php'),
        ], 'filament-donkey.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/avexsoft'),
        ], 'filament-donkey.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/avexsoft'),
        ], 'filament-donkey.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/avexsoft'),
        ], 'filament-donkey.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
