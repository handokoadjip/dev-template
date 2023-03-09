<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_nama' => 'Sidebar',
                'menu_dibuat_pada' => '2023-02-16 08:06:23',
                'menu_diubah_pada' => '2023-02-16 08:06:23'
            ],
        ];

        DB::table('menu')->insert($data);
    }
}
