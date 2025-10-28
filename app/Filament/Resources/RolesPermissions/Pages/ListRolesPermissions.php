<?php

namespace App\Filament\Resources\RolesPermissions\Pages;

use App\Filament\Resources\RolesPermissions\RolesPermissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRolesPermissions extends ListRecords
{
    protected static string $resource = RolesPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
