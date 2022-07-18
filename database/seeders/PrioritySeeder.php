<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            Priority::updateOrCreate([
                'code' => 'P-' . $i,
                'name' => 'PRIORITY ' . $i,
            ]);
        }
    }
}
