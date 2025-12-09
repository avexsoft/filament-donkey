<?php

namespace Avexsoft\FilamentDonkey\Filament\Traits;

use Illuminate\Support\Str;

trait AsConfigField
{
    public static function make(?string $name = null): static
    {
        return parent::make((string) Str::of($name)->replace('.', ':'))
            ->label($name);
    }
}
