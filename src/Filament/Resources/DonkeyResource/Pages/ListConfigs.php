<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\DonkeyResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\DonkeyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigs extends ListRecords
{
    protected static string $resource = DonkeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
