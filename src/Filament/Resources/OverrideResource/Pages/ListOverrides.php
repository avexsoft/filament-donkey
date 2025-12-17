<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOverrides extends ListRecords
{
    protected static string $resource = OverrideResource::class;

    protected ?string $subheading = 'List of config keys that will be overridden';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
