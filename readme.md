<div class="filament-hidden">

![Laravel Created By](https://banners.beyondco.de/Filament%20Donkey.jpeg?theme=light&packageManager=composer+require&packageName=avexsoft%2Ffilament-donkey&pattern=architect&style=style_2&description=&md=1&showWatermark=0&fontSize=75px&images=adjustments)

</div>

# Filament Donkey

[![Latest Version on Packagist](https://img.shields.io/packagist/v/avexsoft/filament-donkey.svg?style=flat-square)](https://packagist.org/packages/avexsoft/filament-donkey)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/avexsoft/filament-donkey/fix-php-code-style-issues.yml?branch=master&label=code%20style&style=flat-square)](https://github.com/avexsoft/filament-donkey/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/avexsoft/filament-donkey.svg?style=flat-square)](https://packagist.org/packages/avexsoft/filament-donkey)

This plugin allows you to modify your Laravel config() in code/any environment without giving access to the .env file.

It's a filament ui to leverage this package [Donkey](https://github.com/avexsoft/donkey)

## Installation

You can install the package via composer.

```bash
composer require avexsoft/filament-donkey
```

## Usage
Add in AdminPanelProvider.php

```php
use Avexsoft\FilamentDonkey\FilamentDonkeyPlugin;

->plugins([
    FilamentDonkeyPlugin::make(),
])
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Avexsoft](https://www.avexsoft.com)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
