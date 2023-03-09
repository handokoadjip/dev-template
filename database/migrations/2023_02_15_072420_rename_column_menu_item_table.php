<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnMenuItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu_item', function (Blueprint $table) {
            $table->renameColumn('id', 'menu_item_id');
            $table->renameColumn('label', 'menu_item_label');
            $table->renameColumn('link', 'menu_item_tautan');
            $table->renameColumn('parent', 'menu_item_induk');
            $table->renameColumn('sort', 'menu_item_urutan');
            $table->renameColumn('class', 'menu_item_icon');
            $table->renameColumn('menu', 'menu_item_menu_id');
            $table->renameColumn('depth', 'menu_item_kedalaman');
            $table->renameColumn('created_at', 'menu_item_dibuat_pada');
            $table->renameColumn('updated_at', 'menu_item_diubah_pada');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_item', function (Blueprint $table) {
            $table->renameColumn('menu_item_diubah_pada', 'updated_at');
            $table->renameColumn('menu_item_dibuat_pada', 'created_at');
            $table->renameColumn('menu_item_kedalaman', 'depth');
            $table->renameColumn('menu_item_menu_id', 'menu');
            $table->renameColumn('menu_item_icon', 'class');
            $table->renameColumn('menu_item_urutan', 'sort');
            $table->renameColumn('menu_item_induk', 'parent');
            $table->renameColumn('menu_item_tautan', 'link');
            $table->renameColumn('menu_item_label', 'label');
            $table->renameColumn('menu_item_id', 'id');
        });
    }
}
