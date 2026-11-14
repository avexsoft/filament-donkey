<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOverride extends EditRecord
{
    protected static string $resource = OverrideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // `original_config_value` is read-only and is maintained by Donkey
        // from the environment/config files, never by this form.
        unset($data['original_config_value']);

        $value = json_decode($data['value']);
        if (is_array($value)) {
            $data['value'] = json_encode($value, JSON_PRETTY_PRINT);
        }

        return $data;
    }
}
