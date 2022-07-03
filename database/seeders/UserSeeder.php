<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::where(['name' => 'superadmin'])->first();
        $adminRole = Role::where(['name' => 'admin'])->first();
        $employeeRole = Role::where(['name' => 'employee'])->first();
        $managerRole = Role::where(['name' => 'manager'])->first();

        $atqiya = User::updateOrCreate([
            'name' => ucwords('suherman atqiya'),
            'email' => 'atqiya@atqiyacode.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $atqiya->assignRole($superAdmin);

        $putri = User::updateOrCreate([
            'name' => ucwords('putri'),
            'email' => 'putri@skripsi.umt',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $putri->assignRole($superAdmin);

        $admin = User::updateOrCreate([
            'name' => ucwords('admin'),
            'email' => 'admin@skripsi.umt',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $admin->assignRole($adminRole);

        $manager = User::updateOrCreate([
            'name' => ucwords('manager'),
            'email' => 'manager@skripsi.umt',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $manager->assignRole($managerRole);

        $employee = User::updateOrCreate([
            'name' => ucwords('employee'),
            'email' => 'employee@skripsi.umt',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $employee->assignRole($employeeRole);
    }
}
