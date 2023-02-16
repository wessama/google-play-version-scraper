<?php

namespace Wessama\GooglePlayVersionScraper;

use Exception;
use RuntimeException;

class GooglePlayVersionScraper
{
    private string $url;
    private string $versionRegex = '/\[\[\[\"(\d+\.\d+\.\d+)/';

    public function __construct(private readonly string $appId)
    {
        $this->url = "https://play.google.com/store/apps/details?id=" . $this->appId;
    }

    public function getVersion(): string
    {
        try {
            $html = file_get_contents($this->url);
        } catch (Exception $exception) {
            throw new RuntimeException("Invalid app URL: " . $exception->getMessage());
        }

        preg_match($this->versionRegex, $html, $matches);
        if (count($matches) < 2) {
            throw new RuntimeException("Failed to extract version number from HTML content");
        }

        return $matches[1];
    }

    public function setVersionRegex(string $versionRegex): void
    {
        $this->versionRegex = $versionRegex;
    }

    public function getVersionRegex(): string
    {
        return $this->versionRegex;
    }
}
