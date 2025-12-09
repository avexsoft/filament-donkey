<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\DonkeyResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\DonkeyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfig extends EditRecord
{
    protected static string $resource = DonkeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $value = json_decode($data['value']);
        if (is_array($value)) {
            $data['value'] = json_encode($value, JSON_PRETTY_PRINT);
        }

        return $data;
    }
}
