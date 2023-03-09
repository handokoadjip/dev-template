<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aksi', function (Blueprint $table) {
            $table->uuid('aksi_id')->primary();
            $table->uuid('aksi_menu_id');
            $table->string('aksi_label');
            $table->string('aksi_tautan');
            $table->timestamp('aksi_dibuat_pada', 0)->nullable();
            $table->timestamp('aksi_diubah_pada', 0)->nullable();

            $table->foreign('aksi_menu_id')->references('menu_id')
                ->on('menu')
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
        Schema::dropIfExists('aksi');
    }
}
