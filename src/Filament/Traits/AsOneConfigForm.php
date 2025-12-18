<?php

namespace Avexsoft\FilamentDonkey\Filament\Traits;

use Avexsoft\Donkey\Models\Override;
use Illuminate\Support\Str;

trait AsOneConfigForm
{
    public function mount(null|int|string $record = null): void
    {
        $data = $this->mutateFormDataBeforeFill($this->readConfigForm());
        $this->form->fill($data);
    }

    /**
     * Overwrite this method if you wish to manipulate `$data` before filling
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $data;
    }

    protected function readConfigForm()
    {
        $state = $this->form->dehydrateState();

        return $this->readConfig($state['data']);
    }

    /**
     * Read the values of config keys
     */
    private function readConfig(array $pairs): array
    {
        $formData = [];
        foreach ($pairs as $key => $value) {
            $formData[$key] = config($this->colonToDot($key));
        }

        return $formData;
    }

    /**
     * Write the config values into the database
     */
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
