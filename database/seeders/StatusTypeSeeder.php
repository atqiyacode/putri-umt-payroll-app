<?php

namespace Database\Seeders;

use App\Models\StatusType;
use Illuminate\Database\Seeder;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusType::updateOrCreate([
            'name' => 'FORCE',
        ]);
        StatusType::updateOrCreate([
            'name' => 'RELEASE',
        ]);
    }
}
