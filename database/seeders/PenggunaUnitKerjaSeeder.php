<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaUnitKerjaSeeder extends Seeder
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
                'pengguna_unit_kerja_id' => '4e638af5-d48b-48a9-97af-ce35f9a1d5fc',
                'pengguna_unit_kerja_pengguna_id' => '2cad17c8-bf22-4ab8-b676-df3777e6ca5b',
                'pengguna_unit_kerja_unit_kerja_id' => '86de0399-170d-4792-ba00-fcd16bca1270',
            ],
            [
                'pengguna_unit_kerja_id' => '63b2418e-e714-47c2-a57f-8943dbea1f2a',
                'pengguna_unit_kerja_pengguna_id' => '2cad17c8-bf22-4ab8-b676-df3777e6ca5b',
                'pengguna_unit_kerja_unit_kerja_id' => '0718f032-2d26-4db7-a885-15d7195cd938',
            ]
        ];

        DB::table('pengguna_unit_kerja')->insert($data);
    }
}
