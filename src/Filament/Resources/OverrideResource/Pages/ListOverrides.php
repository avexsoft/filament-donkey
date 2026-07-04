<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages;

use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Illuminate\Database\Eloquent\Builder;

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

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All'),
            'missing_values' => Tab::make('Missing values')
                ->modifyQueryUsing(fn (Builder $query) => $query->whereNull('value')->orWhere('value', '')),
        ];
    }
}
