<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::updateOrCreate([
            'code' => 'U-1',
            'name' => 'UNIT 1',
        ]);
        Unit::updateOrCreate([
            'code' => 'U-2',
            'name' => 'UNIT 2',
        ]);
        Unit::updateOrCreate([
            'code' => 'U-3',
            'name' => 'UNIT 3',
        ]);
        Unit::updateOrCreate([
            'code' => 'U-BOP',
            'name' => 'UNIT BOP',
        ]);
    }
}
