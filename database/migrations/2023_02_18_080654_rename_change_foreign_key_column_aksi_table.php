<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameChangeForeignKeyColumnAksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aksi', function (Blueprint $table) {
            $table->dropForeign(['aksi_menu_id']);
            $table->renameColumn('aksi_menu_id', 'aksi_menu_item_id');
            $table->foreign('aksi_menu_item_id')->references('menu_item_id')
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
        Schema::table('aksi', function (Blueprint $table) {
            $table->dropForeign(['aksi_menu_item_id']);
            $table->renameColumn('aksi_menu_item_id', 'aksi_menu_id');
            // $table->foreign('aksi_menu_id')->references('menu_id')
            //     ->on('menu')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
        });
    }
}
