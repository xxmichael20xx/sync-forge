<?php

namespace App\Filament\Modules;

use App\Enums\RoleTypes;
use Illuminate\Support\Facades\Auth;

abstract class ModuleBase
{
    /** Get the module name */
    abstract protected static function moduleName(): string;

    /** Check if the current user can access the module */
    protected static function userCanAccess(): bool
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (! $user) return false;

        // Central admin bypass
        if ($user->hasRole(RoleTypes::CENTRAL_ADMIN->value)) return true;

        return $user->modules->contains('module_name', static::moduleName());
    }
}
