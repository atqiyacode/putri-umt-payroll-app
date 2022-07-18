<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Group;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');
        $divisions = collect(Division::all());
        $groups = collect(Group::all());

        // create roles and assign existing permissions

        $user = Role::create(['name' => 'user']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'manage-unit',
            'manage-group',
            'manage-division',
            'manage-priority',
            'manage-status-type',
            'manage-tag-code',
            'create-submission',
            'create-release-submission',
        ]);

        $superAdmin = Role::create(['name' => 'superAdmin']);
        $superAdmin->givePermissionTo([
            'manage-unit',
            'manage-group',
            'manage-division',
            'manage-priority',
            'manage-status-type',
            'manage-tag-code',
            'create-submission',
            'create-release-submission',
        ]);

        $superadminUser = User::updateOrCreate([
            'name' => 'Super Admin',
            'email' => 'atqiya@atqiyacode.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        UserDetail::updateOrCreate([
            'user_id' => $superadminUser->id,
            'division_id' => $divisions->random()->id,
            'group_id' => $groups->random()->id,
            'phone' => $faker->phoneNumber(),
            'nip' => $faker->randomNumber,
        ]);
        $superadminUser->assignRole($superAdmin);


        $adminUser = User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@new-eforce.atqiyacode.com',
            'password' => Hash::make('eforce2022'),
            'email_verified_at' => Carbon::now(),
        ]);
        UserDetail::updateOrCreate([
            'user_id' => $adminUser->id,
            'division_id' => $divisions->random()->id,
            'group_id' => $groups->random()->id,
            'phone' => $faker->phoneNumber(),
            'nip' => $faker->randomNumber,
        ]);
        $adminUser->assignRole($admin);


        $userAccess = User::updateOrCreate([
            'name' => 'User',
            'email' => 'demo@new-eforce.atqiyacode.com',
            'password' => Hash::make('eforce2022'),
            'email_verified_at' => Carbon::now(),
        ]);
        UserDetail::updateOrCreate([
            'user_id' => $userAccess->id,
            'division_id' => $divisions->random()->id,
            'group_id' => $groups->random()->id,
            'phone' => $faker->phoneNumber(),
            'nip' => $faker->randomNumber,
        ]);
        $userAccess->assignRole($user);

        $technician = Role::updateOrCreate(['name' => 'technician']);
        $technician->givePermissionTo([
            'create-submission',
            'execute-submission',
            'approval-submission',
            'create-release-submission',
        ]);

        for ($i = 1; $i <= 1; $i++) {
            $technicianAccess = User::updateOrCreate([
                'name' => 'technician ',
                'email' => 'technician@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $technicianAccess->id,
                'division_id' => $divisions->random()->id,
                'group_id' => $groups->random()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $technicianAccess->assignRole($technician);
        }

        $supervisor = Role::updateOrCreate(['name' => 'supervisor']);
        $supervisor->givePermissionTo([
            'approval-submission',
        ]);

        for ($i = 1; $i <= 1; $i++) {
            $spvAccess = User::updateOrCreate([
                'name' => 'supervisor ',
                'email' => 'supervisor@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $spvAccess->id,
                'division_id' => $divisions->random()->id,
                'group_id' => $groups->random()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $spvAccess->assignRole($supervisor);
        }

        $operator = Role::updateOrCreate(['name' => 'operator']);
        $operator->givePermissionTo([
            'confirmation-submission',
            'approval-submission',
        ]);
        for ($i = 1; $i <= 1; $i++) {
            $operatorAccess = User::updateOrCreate([
                'name' => 'operator ',
                'email' => 'operator@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $operatorAccess->id,
                'division_id' => $divisions->random()->id,
                'group_id' => $groups->random()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $operatorAccess->assignRole($operator);
        }

        $engineer = Role::updateOrCreate(['name' => 'engineer']);
        $engineer->givePermissionTo([
            'approval-submission',
        ]);
        for ($i = 1; $i <= 1; $i++) {
            $engineerAccess = User::updateOrCreate([
                'name' => 'engineer ',
                'email' => 'engineer@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $engineerAccess->id,
                'division_id' => $divisions->random()->id,
                'group_id' => $groups->random()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $engineerAccess->assignRole($engineer);
        }

        $monitoring = Role::updateOrCreate(['name' => 'monitoring']);
        for ($i = 1; $i <= 1; $i++) {
            $monitoringAccess = User::updateOrCreate([
                'name' => 'monitoring ',
                'email' => 'monitoring@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $monitoringAccess->id,
                'division_id' => $divisions->random()->id,
                'group_id' => $groups->random()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $monitoringAccess->assignRole($monitoring);
        }

        $manager = Role::updateOrCreate(['name' => 'manager']);
        for ($i = 1; $i <= 1; $i++) {
            $managerAccess = User::updateOrCreate([
                'name' => 'manager ',
                'email' => 'manager@new-eforce.atqiyacode.com',
                'password' => Hash::make('eforce2022'),
                'email_verified_at' => Carbon::now(),
            ]);
            UserDetail::updateOrCreate([
                'user_id' => $managerAccess->id,
                'division_id' => Division::where('name', 'manager')->first()->id,
                'group_id' => Group::where('name', 'manager')->first()->id,
                'phone' => $faker->phoneNumber(),
                'nip' => $faker->randomNumber,
            ]);
            $managerAccess->assignRole($manager);
        }
    }
}
