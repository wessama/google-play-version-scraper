<?php

namespace Wessama\GooglePlayVersionScraper;

use Illuminate\Support\ServiceProvider;

class GooglePlayVersionScraperServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/google-play-version-scraper.php', 'google-play-version-scraper');

        // Register the service the package provides.
        $this->app->singleton('google-play-version-scraper', function ($app) {
            return new GooglePlayVersionScraper();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['google-play-version-scraper'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/google-play-version-scraper.php' => config_path('google-play-version-scraper.php'),
        ], 'google-play-version-scraper.config');
    }
}
