<?php

namespace Avexsoft\FilamentDonkey\Filament\Traits;

use Avexsoft\Donkey\Models\Override;
use Illuminate\Support\Str;

trait TreatAsConfigForm
{
    public function mount(): void
    {
        $this->form->fill($this->mutateFormDataBeforeFill([]));
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $state = $this->form->dehydrateState();

        return $this->readConfig($state['data']);
    }

    private function readConfig(array $keys): array
    {
        $formData = [];
        foreach ($keys as $key => $value) {
            $formData[$key] = config($this->colonToDot($key));
        }

        return $formData;
    }

    private function writeConfig($keys): void
    {
        foreach ($keys as $key => $value) {
            if ($value !== null) {
                Override::updateOrCreate(['key' => $this->colonToDot($key)], [
                    'value' => $value,
                ]);
            }
        }
    }

    private function colonToDot(string $key)
    {
        return (string) Str::of($key)->replace(':', '.');
    }
}
