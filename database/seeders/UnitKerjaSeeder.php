<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
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
                'unit_kerja_id' => '86de0399-170d-4792-ba00-fcd16bca1270',
                'unit_kerja_nama' => 'Pusdainfo',
                'unit_kerja_deskripsi' => 'Pusdainfo',
                'unit_kerja_dibuat_pada' => '2023-02-20 05:39:02',
                'unit_kerja_diubah_pada' => '2023-02-20 05:39:02',
            ],
            [
                'unit_kerja_id' => '0718f032-2d26-4db7-a885-15d7195cd938',
                'unit_kerja_nama' => 'BAKP',
                'unit_kerja_deskripsi' => 'BAKP',
                'unit_kerja_dibuat_pada' => '2023-02-20 05:39:08',
                'unit_kerja_diubah_pada' => '2023-02-20 05:39:08',
            ]
        ];

        DB::table('unit_kerja')->insert($data);
    }
}
