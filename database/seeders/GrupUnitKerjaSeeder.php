<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupUnitKerjaSeeder extends Seeder
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
                'grup_unit_kerja_id' => '77ad2979-f1c9-4b5a-b9f2-d32566e7ff30',
                'grup_unit_kerja_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_unit_kerja_unit_kerja_id' => '0718f032-2d26-4db7-a885-15d7195cd938',
            ],
        ];

        DB::table('grup_unit_kerja')->insert($data);
    }
}
