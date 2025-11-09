<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionsResource\Pages;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PermissionsResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Permission Name')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->slideOver()
                    ->modalWidth('md'),
                Tables\Actions\EditAction::make()
                    ->slideOver()
                    ->modalWidth('md'),
            ])
            ->bulkActions([
                //
            ]);
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
            'index' => Pages\ListPermissions::route('/'),
            // 'create' => Pages\CreatePermissions::route('/create'),
            // 'view' => Pages\ViewPermissions::route('/{record}'),
            // 'edit' => Pages\EditPermissions::route('/{record}/edit'),
        ];
    }
}
