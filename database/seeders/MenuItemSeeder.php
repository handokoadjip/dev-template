<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemSeeder extends Seeder
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
                'menu_item_id' => 'e66593ce-a1e6-460c-a02b-00ffb4cfe78e',
                'menu_item_label' => 'Dashboard',
                'menu_item_tautan' => '/backoffice/dashboard',
                'menu_item_induk' => '0',
                'menu_item_urutan' => '0',
                'menu_item_icon' => 'fas fa-tachometer-alt',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '0',
                'menu_item_dibuat_pada' => '2023-02-16 08:06:32',
                'menu_item_diubah_pada' => '2023-02-16 08:07:46',
            ],
            [
                'menu_item_id' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'menu_item_label' => 'Setting',
                'menu_item_tautan' => '/backoffice/setting',
                'menu_item_induk' => '0',
                'menu_item_urutan' => '1',
                'menu_item_icon' => 'fas fa-cog',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '0',
                'menu_item_dibuat_pada' => '2023-02-17 03:13:22',
                'menu_item_diubah_pada' => '2023-02-17 03:13:27',
            ],
            [
                'menu_item_id' => 'f220b842-d0b5-4c0d-9625-fff775e69762',
                'menu_item_label' => 'Grup',
                'menu_item_tautan' => '/backoffice/grup',
                'menu_item_induk' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'menu_item_urutan' => '2',
                'menu_item_icon' => 'far fa-id-card',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '1',
                'menu_item_dibuat_pada' => '2023-02-16 08:07:46',
                'menu_item_diubah_pada' => '2023-02-17 03:13:39',
            ],
            [
                'menu_item_id' => 'c9c74676-8338-4da9-8fdd-546c5558eacb',
                'menu_item_label' => 'Unit Kerja',
                'menu_item_tautan' => '/backoffice/unit-kerja',
                'menu_item_induk' => '3c3b17c2-9fc6-4613-a910-3c0160919fe4',
                'menu_item_urutan' => '3',
                'menu_item_icon' => 'far fa-building',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '1',
                'menu_item_dibuat_pada' => '2023-02-17 08:08:16',
                'menu_item_diubah_pada' => '2023-02-17 08:27:59',
            ],
            [
                'menu_item_id' => '83b74e56-ba43-41ad-ad11-31ff053e9125',
                'menu_item_label' => 'Menu',
                'menu_item_tautan' => '/backoffice/menu',
                'menu_item_induk' => '0',
                'menu_item_urutan' => '4',
                'menu_item_icon' => 'far fa-compass',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '0',
                'menu_item_dibuat_pada' => '2023-02-16 08:19:02',
                'menu_item_diubah_pada' => '2023-02-24 09:30:48',
            ],
            [
                'menu_item_id' => '75b20781-449f-4c1b-ad50-f13d2248ba81',
                'menu_item_label' => 'Pengguna',
                'menu_item_tautan' => '/backoffice/pengguna',
                'menu_item_induk' => '0',
                'menu_item_urutan' => '5',
                'menu_item_icon' => 'fas fa-users',
                'menu_item_menu_id' => '568d3027-7a7d-4564-80be-dddb4fe36941',
                'menu_item_kedalaman' => '0',
                'menu_item_dibuat_pada' => '2023-02-17 03:15:18',
                'menu_item_diubah_pada' => '2023-02-24 09:30:48',
            ],
        ];

        DB::table('menu_item')->insert($data);
    }
}
