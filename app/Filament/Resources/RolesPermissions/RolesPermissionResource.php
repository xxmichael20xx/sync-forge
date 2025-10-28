<?php

namespace App\Filament\Resources\RolesPermissions;

use App\Filament\Resources\RolesPermissions\Pages\CreateRolesPermission;
use App\Filament\Resources\RolesPermissions\Pages\EditRolesPermission;
use App\Filament\Resources\RolesPermissions\Pages\ListRolesPermissions;
use App\Filament\Resources\RolesPermissions\Pages\ViewRolesPermission;
use App\Filament\Resources\RolesPermissions\Schemas\RolesPermissionForm;
use App\Filament\Resources\RolesPermissions\Schemas\RolesPermissionInfolist;
use App\Filament\Resources\RolesPermissions\Tables\RolesPermissionsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role;

class RolesPermissionResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return RolesPermissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RolesPermissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RolesPermissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRolesPermissions::route('/'),
            'create' => CreateRolesPermission::route('/create'),
            'view' => ViewRolesPermission::route('/{record}'),
            'edit' => EditRolesPermission::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                //
            ]);
    }
}
