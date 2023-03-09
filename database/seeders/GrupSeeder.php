<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupSeeder extends Seeder
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
                'grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_nama' => 'Root',
                'grup_deskripsi' => 'Root',
                'grup_dibuat_pada' => '2023-02-20 05:35:35',
                'grup_diubah_pada' => '2023-02-20 05:35:35'
            ],
            [
                'grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_nama' => 'Admin',
                'grup_deskripsi' => 'Admin',
                'grup_dibuat_pada' => '2023-02-20 05:35:35',
                'grup_diubah_pada' => '2023-02-20 05:35:35'
            ],
            [
                'grup_id' => '23c9612b-3f8f-4c80-9402-5c9a224a0f25',
                'grup_nama' => 'Pengguna',
                'grup_deskripsi' => 'Pengguna',
                'grup_dibuat_pada' => '2023-02-20 05:35:35',
                'grup_diubah_pada' => '2023-02-20 05:35:35'
            ],
            [
                'grup_id' => '10e59fbd-9be0-42f0-836a-737b1dc2f918',
                'grup_nama' => 'Prodi Ekonomi Pembangunan',
                'grup_deskripsi' => 'Prodi Ekonomi Pembangunan',
                'grup_dibuat_pada' => '2023-02-20 05:35:35',
                'grup_diubah_pada' => '2023-02-20 05:35:35'
            ],
        ];

        DB::table('grup')->insert($data);
    }
}
