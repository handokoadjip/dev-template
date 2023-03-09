<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(GrupSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuItemSeeder::class);
        $this->call(UnitKerjaSeeder::class);
        $this->call(AksiSeeder::class);
        $this->call(PenggunaSeeder::class);
        $this->call(GrupAksiSeeder::class);
        $this->call(GrupMenuItemSeeder::class);
        $this->call(GrupUnitKerjaSeeder::class);
        $this->call(PenggunaGrupSeeder::class);
        $this->call(PenggunaUnitKerjaSeeder::class);
    }
}
