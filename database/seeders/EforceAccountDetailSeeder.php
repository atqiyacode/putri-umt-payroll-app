<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class EforceAccountDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = public_path('user_details.json');
        if (file_exists($data)) {
            $list = [];
            $json = file_get_contents($data);
            $data = json_decode($json, true);
            foreach ($data as $item) {
                $list[] = $item;
            }

            $chunks = array_chunk($list, 100000);
            foreach ($chunks as $chunk) {
                UserDetail::upsert($chunk, 'email', null);
            }
        }
    }
}
