<?php

namespace App\Filament\Modules;

use Filament\Resources\Resource;

abstract class ModuleResource extends Resource
{
    /**
     * Determine if the navigation item for this resource should be registered.
     *
     * @return bool
     */
    public static function shouldRegisterNavigation(): bool
    {
        return static::userCanAccess();
    }

    /**
     * Determine if the resource is globally searchable.
     *
     * @return bool
     */
    public static function getGloballySearchable(): bool
    {
        return static::userCanAccess();
    }
}
