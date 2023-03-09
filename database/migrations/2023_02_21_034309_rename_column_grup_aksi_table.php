<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnGrupAksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grup_aksi', function (Blueprint $table) {
            $table->renameColumn('aksi_grup_id', 'grup_aksi_id');
            $table->renameColumn('aksi_grup_aksi_id', 'grup_aksi_aksi_id');
            $table->renameColumn('aksi_grup_grup_id', 'grup_aksi_grup_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grup_aksi', function (Blueprint $table) {
            $table->renameColumn('grup_aksi_id', 'aksi_grup_id');
            $table->renameColumn('grup_aksi_aksi_id', 'aksi_grup_aksi_id');
            $table->renameColumn('grup_aksi_grup_id', 'aksi_grup_grup_id');
        });
    }
}
