<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaGrupSeeder extends Seeder
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
                'pengguna_grup_id' => '71a0bd46-3bbb-4b70-aade-744c0c390c83',
                'pengguna_grup_pengguna_id' => '1d711ed8-2873-4e45-b57c-2e9ce87bb50a',
                'pengguna_grup_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f'
            ],
            [
                'pengguna_grup_id' => 'a83bdf33-82d9-40fb-8d47-7768583ca46b',
                'pengguna_grup_pengguna_id' => '2cad17c8-bf22-4ab8-b676-df3777e6ca5b',
                'pengguna_grup_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304'
            ],
        ];

        DB::table('pengguna_grup')->insert($data);
    }
}
