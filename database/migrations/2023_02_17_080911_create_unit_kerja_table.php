<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_kerja', function (Blueprint $table) {
            $table->uuid('unit_kerja_id')->primary();
            $table->string('unit_kerja_nama');
            $table->text('unit_kerja_deskripsi');
            $table->timestamp('unit_kerja_dibuat_pada', 0)->nullable();
            $table->timestamp('unit_kerja_diubah_pada', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unit_kerja');
    }
}
