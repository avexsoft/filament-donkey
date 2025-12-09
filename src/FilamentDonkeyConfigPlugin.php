<?php

namespace Avexsoft\FilamentDonkey;

use Avexsoft\FilamentEx\FilamentPluginBase;
use Filament\Contracts\Plugin;

class FilamentDonkeyPlugin extends FilamentPluginBase implements Plugin
{
    protected ?string $navigationGroup = 'Config';

    public function getId(): string
    {
        return 'filament-donkey';
    }
}
