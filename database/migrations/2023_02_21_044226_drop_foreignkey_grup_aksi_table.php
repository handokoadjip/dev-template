<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignkeyGrupAksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grup_aksi', function (Blueprint $table) {
            $table->dropForeign('aksi_grup_aksi_grup_grup_id_foreign');
            $table->dropForeign('aksi_grup_aksi_grup_aksi_id_foreign');
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
            $table->foreign('grup_aksi_grup_id')->references('grup_id')
                ->on('grup')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grup_aksi_aksi_id')->references('aksi_id')
                ->on('aksi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
}
