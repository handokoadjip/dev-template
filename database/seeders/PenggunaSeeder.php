<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
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
                'pengguna_id' => '2cad17c8-bf22-4ab8-b676-df3777e6ca5b',
                'pengguna_nama' => 'Handoko Adji Pangestu',
                'pengguna_email' => 'handokoadjipangestu@gmail.com',
                'pengguna_email_verifikasi_pada' => '2023-02-20 09:30:23',
                'pengguna_password' => Hash::make('qweqweqwe'),
                'pengguna_remember_token' => null,
                'pengguna_dibuat_pada' => '2023-02-20 05:42:14',
                'pengguna_diubah_pada' => '2023-03-01 09:05:34',
                'pengguna_unit_kerja_id' => '86de0399-170d-4792-ba00-fcd16bca1270',
                'pengguna_nik' => '11217053',
                'pengguna_nip' => '11217054',
                'pengguna_telp' => '089650574913',
                'pengguna_jenis_kelamin' => 'laki-laki',
                'pengguna_agama' => 'islam',
                'pengguna_alamat' => 'TEST',
            ],
            [
                'pengguna_id' => '1d711ed8-2873-4e45-b57c-2e9ce87bb50a',
                'pengguna_nama' => 'root',
                'pengguna_email' => 'root@untirta.ac.id',
                'pengguna_email_verifikasi_pada' => '2023-02-20 09:30:23',
                'pengguna_password' => Hash::make('qweqweqwe'),
                'pengguna_remember_token' => null,
                'pengguna_dibuat_pada' => '2023-02-16 08:06:00',
                'pengguna_diubah_pada' => '2023-03-01 07:26:01',
                'pengguna_unit_kerja_id' => null,
                'pengguna_nik' => '112170523',
                'pengguna_nip' => '11217051',
                'pengguna_telp' => '0896505749134',
                'pengguna_jenis_kelamin' => 'perempuan',
                'pengguna_agama' => 'islam',
                'pengguna_alamat' => 'tbai',
            ],
        ];

        DB::table('pengguna')->insert($data);
    }
}
