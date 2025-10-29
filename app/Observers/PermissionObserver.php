<?php

namespace App\Observers;

use App\Enums\RoleTypes;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionObserver
{
    public function created(Permission $permission): void
    {
        $centralRole = Role::where('name', RoleTypes::CENTRAL_ADMIN->value)->first();

        if ($centralRole) {
            $centralRole->givePermissionTo($permission);
        }
    }
}
