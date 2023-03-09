<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->renameColumn('id', 'menu_id');
            $table->renameColumn('name', 'menu_nama');
            $table->renameColumn('created_at', 'menu_dibuat_pada');
            $table->renameColumn('updated_at', 'menu_diubah_pada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->renameColumn('menu_diubah_pada', 'updated_at');
            $table->renameColumn('menu_dibuat_pada', 'created_at');
            $table->renameColumn('menu_nama', 'name');
            $table->renameColumn('menu_id', 'id');
        });
    }
}
