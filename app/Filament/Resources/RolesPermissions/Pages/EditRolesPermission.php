<?php

namespace App\Filament\Resources\RolesPermissions\Pages;

use App\Filament\Resources\RolesPermissions\RolesPermissionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRolesPermission extends EditRecord
{
    protected static string $resource = RolesPermissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
