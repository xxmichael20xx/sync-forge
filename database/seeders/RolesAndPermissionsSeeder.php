<?php

namespace Database\Seeders;

use App\Enums\PermissionTypes;
use App\Enums\RoleTypes;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createRoles();
        $this->createPermissions();
    }

    /**
     * Create default roles.
     *
     * @return void
     */
    protected function createRoles(): void
    {
        $roles = array_column(RoleTypes::cases(), 'value');

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }

    /**
     * Create default permissions.
     *
     * @return void
     */
    protected function createPermissions(): void
    {
        $permissions = array_column(PermissionTypes::cases(), 'value');

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
