<?php

namespace Avexsoft\FilamentDonkey\Filament\Traits;

use Closure;
use Illuminate\Support\Str;

/**
 * Config key is shown in label by default
 * If label is specified, then config key is shifted to hint
 */
trait AsConfigField
{
    public static function make(?string $name = null): static
    {
        $_this = parent::make((string) Str::of($name)->replace('.', ':'))
            ->hint(false)
            ->label($name);

        $_this->hint(null);

        return $_this;
    }

    public function label(\Illuminate\Contracts\Support\Htmlable|Closure|string|null $label = null): static
    {
        if ($this->hint === null) {
            $this->hint($this->name);
        }

        return parent::label($label);
    }
}
