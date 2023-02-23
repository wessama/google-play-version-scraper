<?php

namespace Wessama\GooglePlayVersionScraper;

use Exception;
use RuntimeException;

class GooglePlayVersionScraper
{
    private string $url;
    private string $versionRegex = '/\[\[\[\"(\d+\.\d+\.\d+)/';
    private string $scriptRegex = '/<script\b[^>]*>(.*?)<\/script>/s';

    public function __construct(private string $appId)
    {
        $this->url = "https://play.google.com/store/apps/details?id=" . $this->appId;
    }

    public function getVersion(): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $html = curl_exec($ch);
        curl_close($ch);

        $scriptMatches = [];
        preg_match_all($this->scriptRegex, $html, $scriptMatches);

        foreach ($scriptMatches[1] as $scriptMatch) {
            $version = [];
            if (preg_match($this->versionRegex, $scriptMatch, $version)) {
                return $version[1];
            }
        }

        throw new RuntimeException("Failed to extract version number from HTML content");
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
