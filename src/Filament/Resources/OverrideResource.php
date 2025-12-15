<?php

namespace Avexsoft\FilamentDonkey\Filament\Resources;

use Avexsoft\Donkey\Models\Override;
use Avexsoft\FilamentDonkey\Filament\DonkeyResource;
use Avexsoft\FilamentDonkey\Filament\Resources\OverrideResource\Pages;
use BackedEnum;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class OverrideResource extends DonkeyResource
{
    protected static ?string $model = Override::class;

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
                    ->placeholder('Optional comment to help you remember what this key was for')
                    ->autosize(),
                TextInput::make('key')
                    ->label('Config Key')
                    ->placeholder('The same key used when calling config(...)')
                    ->required(),
                CodeEditor::make('value')
                    ->hint('Can be boolean, number, string or JSON')
                    ->language(Language::Json),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('is_active')
                    ->onColor('success'),
                TextColumn::make('key')
                    // @TODO how to sanitize $record->key and remarks to prevent malicious HTML?
                    ->getStateUsing(fn (Override $record) => "<div><b>{$record->key}</b></div>{$record->remarks}")
                    ->html()
                    ->searchable(),
                TextColumn::make('value')
                    ->wrap()
                    ->searchable(),

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
            'index'  => Pages\ListOverrides::route('/'),
            'create' => Pages\CreateOverride::route('/create'),
            'edit'   => Pages\EditOverride::route('/{record}/edit'),
        ];
    }
}
