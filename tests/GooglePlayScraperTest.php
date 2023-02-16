<?php

namespace Wessama\GooglePlayVersionScraper\Tests;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Wessama\GooglePlayVersionScraper\GooglePlayVersionScraper;

class GooglePlayScraperTest extends TestCase
{
    public function testGetVersionReturnsString()
    {
        $scraper = new GooglePlayVersionScraper('com.github.android');
        $version = $scraper->getVersion();
        $this->assertIsString($version);
    }

    public function testGetVersionThrowsExceptionOnFailure()
    {
        $scraper = new GooglePlayVersionScraper('nonexistent.app.id');
        $this->expectException(RuntimeException::class);
        $scraper->getVersion();
    }

    public function testSetRegexUpdatesVersionRegex()
    {
        $scraper = new GooglePlayVersionScraper('com.github.android');
        $newRegex = '/\[\[\[(\d+\.\d+\.\d+)\]\]\]/';
        $scraper->setVersionRegex($newRegex);
        $this->assertSame($newRegex, $scraper->getVersionRegex());
    }
}
