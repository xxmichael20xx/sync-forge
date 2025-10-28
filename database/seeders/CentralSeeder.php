<?php

namespace Database\Seeders;

use App\Enums\AdminRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class CentralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createCentralAdmin();
    }

    /**
     * Create a central admin user.
     *
     * @return void
     */
    protected function createCentralAdmin(): void
    {
        $adminEmail = 'central@admin.com';
        $adminPassword = 'admin123';

        $centralAdmin = User::firstOrCreate(
            ['email' => $adminEmail],
            [
                'first_name' => 'Central',
                'last_name' => 'Admin',
                'password' => bcrypt($adminPassword),
            ]
        );

        $centralAdmin->assignRole(AdminRole::CENTRAL_ADMIN->value);
    }
}
