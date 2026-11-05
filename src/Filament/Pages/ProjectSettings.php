<?php

namespace Avexsoft\FilamentDonkey\Filament\Pages;

use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigFileUpload;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigTextInput;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigToggle;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;

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
                Section::make('Branding')
                    ->aside()
                    ->description('Logo used as the browser favicon and in the site header')
                    ->schema([
                        ConfigFileUpload::make('branding.logo_upload')
                            ->label('Logo (SVG)')
                            ->helperText('Square SVG, used instead of /favicon.ico. Upload a new file to replace the current logo.')
                            ->disk(config('branding.disk', 'public'))
                            ->directory(dirname(config('branding.logo_svg_path', 'branding/logo.svg')))
                            ->getUploadedFileNameForStorageUsing(fn (): string => basename(config('branding.logo_svg_path', 'branding/logo.svg')))
                            ->deleteUploadedFileUsing(fn (string $file) => Storage::disk(config('branding.disk', 'public'))->delete($file))
                            ->acceptedFileTypes(['image/svg+xml'])
                            ->maxSize(512),
                    ]),
            ]);
    }

    /**
     * Show the logo that is already on disk, so the field is not empty on load
     * and saving the other settings does not wipe the current logo.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $path = config('branding.logo_svg_path');

        $data['branding:logo_upload'] = ($path && Storage::disk(config('branding.disk', 'public'))->exists($path))
            ? $path
            : null;

        return $data;
    }
}
