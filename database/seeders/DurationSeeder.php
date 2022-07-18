<?php

namespace Database\Seeders;

use App\Models\Duration;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 7; $i++) {
            Duration::updateOrCreate([
                'label' => $i
            ]);
        }
    }
}
