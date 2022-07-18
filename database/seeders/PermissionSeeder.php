<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::updateOrCreate(['name' => 'manage-user']);
        Permission::updateOrCreate(['name' => 'manage-group']);
        Permission::updateOrCreate(['name' => 'manage-division']);
        Permission::updateOrCreate(['name' => 'manage-priority']);
        Permission::updateOrCreate(['name' => 'manage-unit']);
        Permission::updateOrCreate(['name' => 'manage-status-type']);
        Permission::updateOrCreate(['name' => 'manage-permission']);
        Permission::updateOrCreate(['name' => 'manage-submission']);
        Permission::updateOrCreate(['name' => 'manage-tag-code']);

        Permission::updateOrCreate(['name' => 'create-submission']);
        Permission::updateOrCreate(['name' => 'approval-submission']);
        Permission::updateOrCreate(['name' => 'confirmation-submission']);
        Permission::updateOrCreate(['name' => 'execute-submission']);
        Permission::updateOrCreate(['name' => 'create-release-submission']);
    }
}
