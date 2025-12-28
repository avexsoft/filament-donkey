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

### Project Settings
<img width="1560" height="632" alt="image" src="https://github.com/user-attachments/assets/7974da13-2d24-432d-8235-24cc3cdd240a" />


### Overrides
<img width="1570" height="612" alt="image" src="https://github.com/user-attachments/assets/f7458d5a-37d4-41e8-a651-73f8c0fe7d93" />


<img width="1560" height="447" alt="image" src="https://github.com/user-attachments/assets/16e8cc12-2a36-4568-a0e4-4aa4615e5891" />




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
