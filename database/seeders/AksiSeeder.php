<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksiSeeder extends Seeder
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
                'aksi_id' => 'c2d1059b-2e40-4311-a3b1-245f001aec08',
                'aksi_menu_item_id' => 'f220b842-d0b5-4c0d-9625-fff775e69762',
                'aksi_label' => 'Hak Akses',
                'aksi_tautan' => '/backoffice/grup/hak-akses',
                'aksi_dibuat_pada' => '2023-02-20 05:35:35',
                'aksi_diubah_pada' => '2023-02-20 05:35:35'
            ],
            [
                'aksi_id' => 'c9b32af3-40cd-4edf-82ea-4fd971fc7d1e',
                'aksi_menu_item_id' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'aksi_label' => 'Aksi',
                'aksi_tautan' => '/backoffice/grup/aksi',
                'aksi_dibuat_pada' => '2023-02-20 05:35:35',
                'aksi_diubah_pada' => '2023-02-20 05:35:35'
            ],
            [
                'aksi_id' => '590f99a7-5b24-4900-a0cc-e6e771dfef6b',
                'aksi_menu_item_id' => '75b20781-449f-4c1b-ad50-f13d2248ba81',
                'aksi_label' => 'Lihat',
                'aksi_tautan' => '/backoffice/pengguna/lihat',
                'aksi_dibuat_pada' => '2023-02-20 05:35:35',
                'aksi_diubah_pada' => '2023-02-20 05:35:35'
            ],
        ];

        DB::table('aksi')->insert($data);
    }
}
