<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksiGrupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksi_grup', function (Blueprint $table) {
            $table->uuid('aksi_grup_id')->primary();
            $table->uuid('aksi_grup_aksi_id');
            $table->uuid('aksi_grup_grup_id');

            $table->foreign('aksi_grup_aksi_id')->references('aksi_id')
                ->on('aksi')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('aksi_grup_grup_id')->references('grup_id')
                ->on('grup')
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
        Schema::dropIfExists('aksi_grup');
    }
}
