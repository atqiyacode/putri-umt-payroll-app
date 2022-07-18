<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class EforceAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = public_path('users.json');
        if (file_exists($data)) {
            $list = [];
            $json = file_get_contents($data);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $list[] = $item;
            }

            $chunks = array_chunk($list, 100000);
            foreach ($chunks as $chunk) {
                User::upsert($chunk, 'email', null);
            }
        }
    }
}
