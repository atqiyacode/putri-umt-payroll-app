<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::updateOrCreate([
            'code' => 'D-1',
            'name' => 'Pemeliharaan',
        ]);
        Division::updateOrCreate([
            'code' => 'D-2',
            'name' => 'Engineering',
        ]);
        Division::updateOrCreate([
            'code' => 'D-3',
            'name' => 'Operator Unit',
        ]);
        Division::updateOrCreate([
            'code' => 'D-4',
            'name' => 'Operator BOP',
        ]);
        Division::updateOrCreate([
            'code' => '01',
            'name' => 'manager',
        ]);
    }
}
