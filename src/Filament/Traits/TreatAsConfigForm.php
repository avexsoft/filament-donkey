<?php

namespace Avexsoft\FilamentDonkey\Filament\Traits;

use Avexsoft\Donkey\Models\Donkey;
use Illuminate\Support\Str;

trait TreatAsConfigForm
{
    public function mutateFormDataBeforeFill(array $data, string $formName, $modelOrArray = null): array
    {
        $state = $this->$formName->dehydrateState();

        return $this->readConfig($state['data'][$formName]);
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
                Donkey::updateOrCreate(['key' => $this->colonToDot($key)], [
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
