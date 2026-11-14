<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource;
use Exception;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateOverride extends CreateRecord
{
    protected static string $resource = OverrideResource::class;

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->keyBindings(['mod+enter']),
            ...($this->canCreateAnother() ? [$this->getCreateAnotherFormAction()] : []),
            $this->getCancelFormAction(),
        ];
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // `original_config_value` is read-only and is maintained by Donkey
        // from the environment/config files, never by this form.
        unset($data['original_config_value']);

        return $data;

        // @TODO check if this code is required
        $value = json_decode($data['value']);
        if (is_array($value)) {
            $data['value'] = json_encode($value, JSON_PRETTY_PRINT);
        }

        return $data;
    }

    public function create(bool $another = false): void
    {
        try {
            parent::create($another);
        } catch (Exception $e) {
            Notification::make()
                ->title($e->getMessage())
                ->danger()
                ->send();

            throw $e;
        }
    }
}
