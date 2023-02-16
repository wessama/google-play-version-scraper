# Google Play Version Scraper

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

Simple package to get the latest version of an Android app from the Google Play Store details page. For use with Laravel 9 and above.

## Installation

Via Composer

``` bash
$ composer require wessama/google-play-version-scraper
```

## Usage

``` php
use Wessama\GooglePlayVersionScraper\GooglePlayVersionScraper;

$scraper = new GooglePlayVersionScraper('com.app.name');
$version = $scraper->getVersion(); 
```

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email wessam.ah@outlook.com instead of using the issue tracker.

## Credits

- [Wessam Ahmed][link-author]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/wessama/google-play-version-scraper.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/wessama/google-play-version-scraper.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/wessama/google-play-version-scraper
[link-downloads]: https://packagist.org/packages/wessama/google-play-version-scraper
[link-author]: https://github.com/wessama
