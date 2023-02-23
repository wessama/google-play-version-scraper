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
}
