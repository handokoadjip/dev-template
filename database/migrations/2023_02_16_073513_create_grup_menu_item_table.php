<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_menu_item', function (Blueprint $table) {
            $table->uuid('grup_menu_item_id')->primary();
            $table->uuid('grup_menu_item_grup_id');
            $table->uuid('grup_menu_item_menu_item_id');
            $table->string('grup_menu_item_tambah')->default('tidak')->comment('ya | tidak');
            $table->string('grup_menu_item_ubah')->default('tidak')->comment('ya | tidak');
            $table->string('grup_menu_item_hapus')->default('tidak')->comment('ya | tidak');

            $table->foreign('grup_menu_item_grup_id')->references('grup_id')
                ->on('grup')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grup_menu_item_menu_item_id')->references('menu_item_id')
                ->on('menu_item')
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
        Schema::dropIfExists('grup_menu_item');
    }
}
