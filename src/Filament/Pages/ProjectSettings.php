<?php

namespace Avexsoft\FilamentDonkey\Filament\Pages;

use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigTextInput;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigToggle;
use Filament\Schemas\Components\Section;

class ProjectSettings extends ConfigurationPage
{
    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->statePath('data')
            ->schema([
                Section::make('Application')
                    ->aside()
                    ->description('Configuration for APP_xxx')
                    ->schema([
                        ConfigTextInput::make('app.name')
                            ->label('Application name'),
                        ConfigToggle::make('app.debug')
                            ->label('Application debug mode'),
                    ]),
            ]);
    }
}
