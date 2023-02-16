<?php

namespace Wessama\GooglePlayVersionScraper\Facades;

use Illuminate\Support\Facades\Facade;

class GooglePlayVersionScraper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'google-play-version-scraper';
    }
}
