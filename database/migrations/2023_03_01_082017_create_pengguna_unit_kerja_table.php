<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna_unit_kerja', function (Blueprint $table) {
            $table->uuid('pengguna_unit_kerja_id')->primary();
            $table->uuid('pengguna_unit_kerja_pengguna_id');
            $table->uuid('pengguna_unit_kerja_unit_kerja_id');

            $table->foreign('pengguna_unit_kerja_pengguna_id')->references('pengguna_id')
                ->on('pengguna')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('pengguna_unit_kerja_unit_kerja_id')->references('unit_kerja_id')
                ->on('unit_kerja')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna_unit_kerja');
    }
}
