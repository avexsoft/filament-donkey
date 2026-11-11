<?php

namespace Avexsoft\FilamentDonkey\Filament\Pages;

use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigFileUpload;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigTextInput;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigToggle;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Facades\Storage;

class ProjectSettings extends ConfigurationPage
{
    /**
     * Path of the uploaded favicon, relative to the branding disk.
     */
    private const FAVICON_PATH = 'branding/favicon.svg';

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
                        ConfigFileUpload::make('app.favicon')
                            ->label('Logo (SVG)')
                            ->helperText('Square SVG, used instead of /favicon.ico. Upload a new file to replace the current logo.')
                            ->disk(self::faviconDisk())
                            ->directory(dirname(self::FAVICON_PATH))
                            ->getUploadedFileNameForStorageUsing(fn (): string => basename(self::FAVICON_PATH))
                            ->deleteUploadedFileUsing(fn (string $file) => Storage::disk(self::faviconDisk())->delete($file))
                            ->acceptedFileTypes(['image/svg+xml'])
                            ->maxSize(512),
                    ]),
            ]);
    }

    /**
     * Show the favicon that is already on disk, so the field is not empty on
     * load and saving the other settings does not wipe the current favicon.
     */
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $path = $this->currentFaviconPath();

        $data['app:favicon'] = ($path && Storage::disk(self::faviconDisk())->exists($path))
            ? $path
            : null;

        return $data;
    }

    /**
     * The stored key is `app.favicon`. The other keys are kept for backwards
     * compatibility with favicons saved by the first version of this field.
     */
    private function currentFaviconPath(): ?string
    {
        foreach (['app.favicon', 'branding.logo_upload', 'branding.logo_svg_path'] as $key) {
            $path = config($key);

            if (filled($path)) {
                return $path;
            }
        }

        return null;
    }

    private static function faviconDisk(): string
    {
        return (string) config('branding.disk', 'public');
    }
}
