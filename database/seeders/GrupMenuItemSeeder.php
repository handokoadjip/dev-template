<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupMenuItemSeeder extends Seeder
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
                'grup_menu_item_id' => 'a0c4d938-e413-42d7-948a-c80d641b7c65',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => 'e66593ce-a1e6-460c-a02b-00ffb4cfe78e',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => '90b3aab3-eb1c-434d-88c4-52bf598f28f7',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => 'c1f8c504-d884-4a7b-9139-0f343e6b9a11',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => 'f220b842-d0b5-4c0d-9625-fff775e69762',
                'grup_menu_item_tambah' => 'ya',
                'grup_menu_item_ubah' => 'ya',
                'grup_menu_item_hapus' => 'ya'
            ],
            [
                'grup_menu_item_id' => 'a7b2e783-8b55-406d-bad0-b81b98553aea',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => 'c9c74676-8338-4da9-8fdd-546c5558eacb',
                'grup_menu_item_tambah' => 'ya',
                'grup_menu_item_ubah' => 'ya',
                'grup_menu_item_hapus' => 'ya'
            ],
            [
                'grup_menu_item_id' => '86ab40ab-5f2b-4408-886c-cfc0646e8ace',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => '83b74e56-ba43-41ad-ad11-31ff053e9125',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => 'faefa972-39de-40f8-b556-e8c292f76a2e',
                'grup_menu_item_grup_id' => 'a6d315d6-c86d-44c6-bc60-2f6f83c8ce2f',
                'grup_menu_item_menu_item_id' => '75b20781-449f-4c1b-ad50-f13d2248ba81',
                'grup_menu_item_tambah' => 'ya',
                'grup_menu_item_ubah' => 'ya',
                'grup_menu_item_hapus' => 'ya'
            ],
            [
                'grup_menu_item_id' => '7707a772-e6bc-4bcc-8537-ce3d466b5662',
                'grup_menu_item_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_menu_item_menu_item_id' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => '4ad8945b-65fc-4634-9190-65f6d6c446fb',
                'grup_menu_item_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_menu_item_menu_item_id' => 'f220b842-d0b5-4c0d-9625-fff775e69762',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => '01e9b276-c5b4-464f-a372-f07f1a5dc07a',
                'grup_menu_item_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_menu_item_menu_item_id' => 'c9c74676-8338-4da9-8fdd-546c5558eacb',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ],
            [
                'grup_menu_item_id' => 'dd478439-c69b-41e8-8b5a-53abfd5fa25c',
                'grup_menu_item_grup_id' => '4e23cb6e-037a-42b7-abb2-335944a11304',
                'grup_menu_item_menu_item_id' => '83b74e56-ba43-41ad-ad11-31ff053e9125',
                'grup_menu_item_tambah' => 'tidak',
                'grup_menu_item_ubah' => 'tidak',
                'grup_menu_item_hapus' => 'tidak'
            ]
        ];

        DB::table('grup_menu_item')->insert($data);
    }
}
