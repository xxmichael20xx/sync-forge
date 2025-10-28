<?php

namespace App\Filament\Resources\RolesPermissions\Pages;

use App\Filament\Resources\RolesPermissions\RolesPermissionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRolesPermission extends ViewRecord
{
    protected static string $resource = RolesPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
