<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupUnitKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_unit_kerja', function (Blueprint $table) {
            $table->uuid('grup_unit_kerja_id')->primary();
            $table->uuid('grup_unit_kerja_grup_id');
            $table->uuid('grup_unit_kerja_unit_kerja_id');

            $table->foreign('grup_unit_kerja_grup_id')->references('grup_id')
                ->on('grup')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grup_unit_kerja_unit_kerja_id')->references('unit_kerja_id')
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
        Schema::dropIfExists('grup_unit_kerja');
    }
}
