<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupAksiSeeder extends Seeder
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
                'grup_aksi_id' => '914eef07-6b49-49df-a43d-9f537fe38bc5',
                'grup_aksi_aksi_id' => 'c2d1059b-2e40-4311-a3b1-245f001aec08',
                'grup_aksi_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
            ],
            [
                'grup_aksi_id' => 'f3a1d6a3-f7f0-477c-a00a-dcb0d4034dd2',
                'grup_aksi_aksi_id' => 'c9b32af3-40cd-4edf-82ea-4fd971fc7d1e',
                'grup_aksi_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
            ],
            [
                'grup_aksi_id' => 'e5eb8306-2a6a-4e04-9d09-3d0c864bdbc7',
                'grup_aksi_aksi_id' => '590f99a7-5b24-4900-a0cc-e6e771dfef6b',
                'grup_aksi_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
            ],
        ];

        DB::table('grup_aksi')->insert($data);
    }
}
