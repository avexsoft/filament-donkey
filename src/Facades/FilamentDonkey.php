<?php

namespace Avexsoft\FilamentDonkey\Facades;

use Illuminate\Support\Facades\Facade;

class FilamentDonkey extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'filament-donkey';
    }
}
