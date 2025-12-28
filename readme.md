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

### Step 1: Install the package via composer.

```bash
composer require avexsoft/filament-donkey
```


### Step 2: Add in AdminPanelProvider.php

```php
use Avexsoft\FilamentDonkey\FilamentDonkeyPlugin;

->plugins([
    FilamentDonkeyPlugin::make(),
])
```

## Usage

Using the power of [Donkey](https://github.com/avexsoft/donkey), this package make it easier to utilize filament ui conveniency to do such things:


### Modify Project Settings
<img width="1560" height="632" alt="image" src="https://github.com/user-attachments/assets/7974da13-2d24-432d-8235-24cc3cdd240a" />
    - This page allows you to modify project settings using a friendlier ui.


### Override Config Using UI
<img width="1570" height="612" alt="image" src="https://github.com/user-attachments/assets/f7458d5a-37d4-41e8-a651-73f8c0fe7d93" />
    - This page allows especially developer to add, override or modify config.
    - `Config Key` is the key of the config e.g `app.name`, `app.debug`
    - `Value` will be the desired value of the specific config
    - `Is Masked` will obscured sensitive config fields
    - `Is Active` make it possible to ignore a override config.



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
