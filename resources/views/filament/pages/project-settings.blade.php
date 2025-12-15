<x-filament-panels::page>
    {{-- <x-filament-panels::form wire:submit="save"> --}}
    <form class="grid gap-y-6" id="form" wire:submit="save">
        {{ $this->form }}

        {{-- <x-filament-panels::form.actions :actions="$this->getFormActions()" /> --}}
        <x-filament::actions :actions="$this->getFormActions()" />
    </form>
    {{-- </x-filament-panels::form> --}}
</x-filament-panels::page>
