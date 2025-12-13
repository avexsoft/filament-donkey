<?php

namespace Avexsoft\FilamentDonkey\Filament;

use Avexsoft\FilamentDonkey\FilamentDonkeyPlugin;
use Filament\Resources\Resource;

abstract class DonkeyResource extends Resource
{
    protected static ?string $plugin = FilamentDonkeyPlugin::class;
}
