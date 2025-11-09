<?php

namespace App\Filament\Resources\RolesResource\Pages;

use App\Filament\Resources\RolesResource;
use Filament\Actions;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewRoles extends ViewRecord
{
    protected static string $resource = RolesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make($this->record->name . ' Permissions')
                    ->schema([
                        Grid::make(4)->schema($this->preparePermissionsEntries()),
                    ])
            ]);
    }

    /**
     * Prepare permission entries for the infolist.
     *
     * @return array
     */
    protected function preparePermissionsEntries(): array
    {
        $data = collect($this->record->permissions)
            ->map(fn ($permission) => TextEntry::make('')
                ->label($permission->name)
            )
            ->values()
            ->all();
        return $data;
    }
}
