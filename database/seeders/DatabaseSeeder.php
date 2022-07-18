<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(StatusTypeSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(WorkflowStatusSeeder::class);
        $this->call(DurationSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(SubmissionSeeder::class);

        $this->call(EforceAccountSeeder::class);
        $this->call(EforceAccountDetailSeeder::class);
    }
}
