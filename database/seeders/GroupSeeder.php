<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::updateOrCreate([
            'code' => 'G-1',
            'name' => 'HKI',
        ]);
        Group::updateOrCreate([
            'code' => 'G-2',
            'name' => 'HL',
        ]);
        Group::updateOrCreate([
            'code' => 'G-3',
            'name' => 'HMB',
        ]);
        Group::updateOrCreate([
            'code' => 'G-4',
            'name' => 'HMT',
        ]);
        Group::updateOrCreate([
            'code' => 'G-5',
            'name' => 'HM-BOP',
        ]);
        Group::updateOrCreate([
            'code' => 'G-6',
            'name' => 'CBM',
        ]);
        Group::updateOrCreate([
            'code' => 'G-7',
            'name' => 'REGU A',
        ]);
        Group::updateOrCreate([
            'code' => 'G-8',
            'name' => 'REGU B',
        ]);
        Group::updateOrCreate([
            'code' => 'G-9',
            'name' => 'REGU C',
        ]);
        Group::updateOrCreate([
            'code' => 'G-10',
            'name' => 'REGU D',
        ]);
        Group::updateOrCreate([
            'code' => '01',
            'name' => 'manager',
        ]);
    }
}
