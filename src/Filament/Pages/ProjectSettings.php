<?php

namespace Avexsoft\FilamentDonkey\Filament\Pages;

use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigTextInput;
use Avexsoft\FilamentDonkey\Filament\Forms\Components\ConfigToggle;
use Avexsoft\FilamentDonkey\Filament\Traits\TreatAsConfigForm;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;

class ProjectSettings extends Page implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;
    use TreatAsConfigForm;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';

    protected ?string $subheading = 'Various tests and settings on how the application behaves';

    protected string $view = 'filament.pages.project-settings';

    public function mount(): void
    {
        $this->form->fill([]);
    }

    public static function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                Section::make('Application')
                    ->aside()
                    ->description('Configuration for APP_xxx')
                    ->schema([
                        ConfigToggle::make('app.debug'),
                        ConfigTextInput::make('app.name'),
                    ]),
            ]);
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            auth()->user()->company->update($data);
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title('Success')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->submit('save'),
        ];
    }
}
