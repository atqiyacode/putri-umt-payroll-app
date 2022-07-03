<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // start role permission - admin
        Permission::updateOrCreate(['id' => 1, 'name' => 'manage employee daily attendance']);
        Permission::updateOrCreate(['id' => 2, 'name' => 'manage employee payslips']);
        Permission::updateOrCreate(['id' => 3, 'name' => 'print employee payslips']);
        Permission::updateOrCreate(['id' => 4, 'name' => 'manage employee salary monthly reports']);
        Permission::updateOrCreate(['id' => 5, 'name' => 'manage employee data']);
        // end role permission - admin

        // start role permission - employee
        Permission::updateOrCreate(['id' => 6, 'name' => 'see payslip']);
        Permission::updateOrCreate(['id' => 7, 'name' => 'print payslip']);
        // end role permission - employee

        // start role permission - GM
        Permission::updateOrCreate(['id' => 8, 'name' => 'see employee salary monthly reports']);
        Permission::updateOrCreate(['id' => 9, 'name' => 'print employee salary monthly reports']);
        // end role permission - GM

        // add role
        Role::updateOrCreate(['name' => 'superadmin']);

        $admin = Role::updateOrCreate(['name' => 'admin']);
        $admin->givePermissionTo([1, 2, 3, 4, 5]);

        $employee = Role::updateOrCreate(['name' => 'employee']);
        $employee->givePermissionTo([6, 7]);

        $manager = Role::updateOrCreate(['name' => 'manager']);
        $manager->givePermissionTo([8, 9]);
    }
}
