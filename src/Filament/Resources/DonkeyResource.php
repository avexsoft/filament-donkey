<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources;

use Avexsoft\Donkey\Models\Donkey;
use Avexsoft\FilamentDonkey\Filament\DonkeyResource as _DonkeyResource;
use Avexsoft\FilamentDonkey\Filament\Resources\DonkeyResource\Pages;
use BackedEnum;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class DonkeyResource extends _DonkeyResource
{
    protected static ?string $model = Donkey::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Toggle::make('is_active')
                    ->default(true)
                    ->onColor('success'),
                Textarea::make('remarks')
                    ->autosize(),
                TextInput::make('key')
                    ->required(),
                CodeEditor::make('value')
                    ->language(Language::Json),
            ]);
    }

    public static function table(Table $table): Table
    {
        return static::tableDefaults($table)
            ->columns([
                ToggleColumn::make('is_active')
                    ->onColor('success'),
                TextColumn::make('key')
                    // @TODO how to sanitize $record->key and remarks to prevent malicious HTML?
                    ->getStateUsing(fn (Donkey $record) => "<div><b>{$record->key}</b></div>{$record->remarks}")
                    ->html(),
                TextColumn::make('value')
                    ->wrap(),

            ])
            ->filters([
            ])
            ->actions([
                \Filament\Actions\EditAction::make(),
                \Filament\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                \Filament\Actions\BulkActionGroup::make([
                    \Filament\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListConfigs::route('/'),
            'create' => Pages\CreateConfig::route('/create'),
            'edit'   => Pages\EditConfig::route('/{record}/edit'),
        ];
    }
}
