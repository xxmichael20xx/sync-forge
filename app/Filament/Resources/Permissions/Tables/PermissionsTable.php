<?php

namespace App\Filament\Resources\Permissions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Permission Name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->groups([
                Group::make('name')
                    ->getTitleFromRecordUsing(fn (Permission $permission) => Str::of($permission->name)->before('.')->headline())
                    ->collapsible()
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
